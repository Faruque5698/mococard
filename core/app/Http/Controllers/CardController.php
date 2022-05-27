<?php

namespace App\Http\Controllers;

use App\Http\Helpers\Mailer;
use App\Models\AdminNotification;
use App\Models\CreateCardRequest;
use App\Models\GeneralSetting;
use App\Models\Plan;
use App\Models\RefferBonus;
use App\Models\RefferBonusSettings;
use App\Models\Transaction;
use App\Models\User;
use App\Models\VirtualCard;
use App\Models\Charge;
use App\Models\History;
use App\Models\Virtualtransactions;
use App\Models\Wallet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{
    public function __construct(){
        $this->activeTemplate = activeTemplate();
    }


    public function card_package(){
        $plans = Plan::where('status', 1)->get();
        return response()->json([
           'status'=>200,
           'card_plan'=>$plans
        ]);
    }

    public function cardSelect(Request $request){
        $request->validate([
           'plan_id'=>'required',
            'card_holder_name'=>'required',
            'amount'=>'required',
            'card_color'=>'required'
        ]);

        $id = $request->plan_id;
        $card_holder_name = $request->card_holder_name;
        $amount = $request->amount;
        $bg = $request->bg;
        $tempId = 'tempId-'. Auth::user()->id . time() . rand(6, 100);
        $plan = Plan::find($id);
        $amount_with_load_fee = ($amount + $plan->card_load_fee);
        $amount_with_load_fee_per = ($amount_with_load_fee / 100) * $plan->card_load_fee_percentage;
        $total_amount = $amount_with_load_fee + $amount_with_load_fee_per + $plan->card_issuance_fee;
        $charge_amount = $total_amount - $amount;

        $set = GeneralSetting::first();
        $user = Auth::user();

        //check if unique request for every card
        $checkCreateCardRequest = CreateCardRequest::where('user_id', $user->id)->where('temp_id', $tempId)->where('status', 0)->first();
        if ($checkCreateCardRequest){
//            $notify[] = ['warning', 'This card creation request already sent, Please wait and reload this page after some time'];
//            return redirect()->route('user.card')->withNotify($notify);
            return response()->json([
               'message'=>'This card creation request already sent, Please wait and reload this page after some time'
            ]);
        }

        if ($user->balance > $total_amount) {
            $currency = $set->cur_text;
            $trx = 'VC-' . time() . rand(6, 100);


            //Request create card task add
            $createCardRequest = new CreateCardRequest();
            $createCardRequest->user_id = $user->id;
            $createCardRequest->temp_id = $tempId;
            $createCardRequest->save();

            $callBack = route('flutterWave.callBack').'?c_user_id='.$user->id.'&c_plan_id='.$plan->id.'&c_card_bg='.$bg.'&c_amount='.$amount.'&c_total_amount='.$total_amount.'&c_temp_id='.$tempId.'&c_trx='.$trx;
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.flutterwave.com/v3/virtual-cards",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "{\n    \"currency\": \"$currency\",\n    \"amount\": $amount,\n    \"billing_name\": \"$card_holder_name\",\n   \"callback_url\": \"$callBack/\"\n}",
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json",
                    "Authorization: Bearer " . env('SECRET_KEY')
                ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            $result = json_decode($response, true);

            if (isset($result)){
                if ( $result['status'] === 'success' && array_key_exists('data', $result) ) {

                    //Credit Card creation Charge
                    $charge = new Charge();
                    $charge->user_id = $user->id;
                    $charge->ref_id = $trx;
                    $charge->amount = $total_amount;
                    $charge->log = 'Virtual Card creation charge #';
                    $charge->save();

                    //History
                    $his = new History();
                    $his->user_id = $user->id;
                    $his->ref_id = $trx;
                    $his->amount = $total_amount;
                    $his->type = "Card Creation";
                    $his->save();

                    //Debit User
                    $user->balance = $user->balance - $total_amount;
                    $user->save();

                    $wallet = Wallet::where('user_id','=',$user->id)->first();
                    $wallet->amount = $wallet->amount-$total_amount;
                    $wallet->save();

                    //Save Card
                    $v_card = new VirtualCard();
                    $v_card->user_id = $user->id;
                    $v_card->card_id = $result['data']['id'];
                    $v_card->plan_id = $plan->id;
                    $v_card->name = $card_holder_name;
                    $v_card->account_id = $result['data']['account_id'];
                    $v_card->card_hash = $result['data']['id'];
                    $v_card->card_pan = $result['data']['card_pan'];
                    $v_card->masked_card = $result['data']['masked_pan'];
                    $v_card->cvv = $result['data']['cvv'];
                    $v_card->expiration = $result['data']['expiration'];
                    $v_card->card_type = $result['data']['card_type'];
                    $v_card->name_on_card = $result['data']['name_on_card'];
                    $v_card->callback = $result['data']['callback_url'];
                    $v_card->ref_id = $trx;
                    $v_card->secret = $trx;
                    $v_card->bg = $bg;
                    $v_card->city = $result['data']['city'];
                    $v_card->state = $result['data']['state'];
                    $v_card->zip_code = $result['data']['zip_code'];
                    $v_card->address = $result['data']['address_1'];
                    $v_card->amount = $amount;
                    $v_card->currency = $result['data']['currency'];
                    $v_card->charge = $total_amount - $amount;
                    if ($result['data']['is_active']) {
                        $v_card->is_active = 1;
                    } else {
                        $v_card->is_active = 0;
                    }
                    $v_card->funding = $plan->funding;
                    $v_card->terminate = 0;
                    $v_card->bg = $request->bg;
                    $v_card->save();

                    //delete temporary card creation request;
                    $deleteCreateCardRequest = CreateCardRequest::where('user_id', $user->id)->where('temp_id', $tempId);
                    if ($deleteCreateCardRequest->first()){
                        $deleteCreateCardRequest->delete();
                    }

                    $user = User::findOrFail(Auth::user()->id);

                    // transaction
                    $transaction = new Transaction();
                    $transaction->user_id = $user->id;
                    $transaction->amount = $amount;
                    $transaction->post_balance = $user->balance;
                    $transaction->charge = $total_amount - $amount;
                    $transaction->trx_type = '-';
                    $transaction->details = 'Purchased new card, Card No: ' . $result['data']['card_pan'];
                    $transaction->trx =  $trx;
                    $transaction->save();

                    // Admin Notification
                    $adminNotification = new AdminNotification();
                    $adminNotification->user_id = $user->id;
                    $adminNotification->title = $user->username.' has purchased '.$plan->name;
                    $adminNotification->click_url = urlPath('admin.virtualCard');
                    $adminNotification->save();

                    // Send Email
                    $type = "CARD_BUY";
                    $shortCodes = [
                        'price' => $total_amount,
                        'currency' => $v_card->currency,
                        'purchase_at' => date('d-m-Y', strtotime($v_card->created_at)),
                        'trx' => $trx,
                        'post_balance' => $v_card->amount,

                    ];
                    sendEmail($user, $type, $shortCodes);

//                    $notify[] = ['success', 'Virtual card has been created successfully.'];

                    $bonus = RefferBonusSettings::find(1);

                    $refers = RefferBonus::where('refer_by_id','=',auth()->user()->ref_by)->first();
                    if ($refers -> isEmpty()){
                        $refer = new RefferBonus();
                        $refer->refer_by_id = auth()->user()->ref_by;
//                    $refer->new_user_id = $user->id;
                        $refer->refer_bonus = $bonus->refer_by_bonus;
                        $refer->save();
                    }else{
                        $refers->refer_bonus = $refers->refer_bonus+$bonus->refer_by_bonus;
                        $refers->save();
                    }



                    return response()->json([
                       'status'=>'200',
                       'message'=> 'Virtual card has been created successfully.'
                    ]);

//                    return redirect()->route('user.card')->withNotify($notify);
                }
                else {
//                    $notify[] = ['warning','Please wait a moment and refresh this page.'];
                    return response()->json([
                        'message'=> 'Please wait a moment & try again later '
                    ]);                }
            }else {
//                $notify[] = ['warning', 'Please wait a moment and refresh this page.'];
                return response()->json([
                    'message' => 'Please wait a moment & try again later'
                ]);
            }
        } else {
//            $notify[] = ['warning', 'Account balance is insufficient.'];
            return response()->json([
                'message' => 'Account balance is insufficient.'
            ]);
        }
    }


    public function index()
    {
        $plans = Plan::where('status', 1)->get();
        $pageTitle = 'Manage Plan';
        $extends = Auth::user() ? $this->activeTemplate.'layouts.master': $this->activeTemplate.'layouts.frontend';
        return view($this->activeTemplate.'card.virtual-card',compact('pageTitle', 'plans', 'extends'));
    }

    public function selectCard($id)
    {
        $card = Plan::find($id);
        $pageTitle = 'Manage Plan';
        $extends = Auth::user() ? $this->activeTemplate.'layouts.master': $this->activeTemplate.'layouts.frontend';
        return view($this->activeTemplate.'card.virtual-card-buy',compact('pageTitle', 'card', 'extends'));
    }

    public function cardCheckOut(Request $request)
    {
        $id = $request->id;
        $card_holder_name= $request->card_holder_name;
        $amount = $request->amount;
        $bg = $request->bg;
        $card = Plan::find($id);
        $amount_with_load_fee =  ($amount + $card->card_load_fee);
        $amount_with_load_fee_per = ($amount_with_load_fee / 100) * $card->card_load_fee_percentage;
        $total_amount = $amount_with_load_fee + $amount_with_load_fee_per + $card->card_issuance_fee;

        $pageTitle = 'Manage Plan';
        $extends = Auth::user() ? $this->activeTemplate.'layouts.master': $this->activeTemplate.'layouts.frontend';
        return view($this->activeTemplate.'card.virtual-card-buy-confirm',compact('pageTitle', 'bg','total_amount','card_holder_name', 'amount', 'card', 'extends'));
    }

    public function cardConfirm(Request $request)
    {
        $id = $request->id;
        $card_holder_name = $request->card_holder_name;
        $amount = $request->amount;
        $bg = $request->bg;
        $tempId = $request->temp_id;
        $plan = Plan::find($id);
        $amount_with_load_fee = ($amount + $plan->card_load_fee);
        $amount_with_load_fee_per = ($amount_with_load_fee / 100) * $plan->card_load_fee_percentage;
        $total_amount = $amount_with_load_fee + $amount_with_load_fee_per + $plan->card_issuance_fee;
        $charge_amount = $total_amount - $amount;

        $set = GeneralSetting::first();
        $user = Auth::user();

        //check if unique request for every card
        $checkCreateCardRequest = CreateCardRequest::where('user_id', $user->id)->where('temp_id', $tempId)->where('status', 0)->first();
        if ($checkCreateCardRequest){
            $notify[] = ['warning', 'This card creation request already sent, Please wait and reload this page after some time'];
            return redirect()->route('user.card')->withNotify($notify);
        }

        if ($user->balance > $total_amount) {
            $currency = $set->cur_text;
            $trx = 'VC-' . time() . rand(6, 100);


            //Request create card task add
            $createCardRequest = new CreateCardRequest();
            $createCardRequest->user_id = $user->id;
            $createCardRequest->temp_id = $tempId;
            $createCardRequest->save();

            $callBack = route('flutterWave.callBack').'?c_user_id='.$user->id.'&c_plan_id='.$plan->id.'&c_card_bg='.$bg.'&c_amount='.$amount.'&c_total_amount='.$total_amount.'&c_temp_id='.$tempId.'&c_trx='.$trx;
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.flutterwave.com/v3/virtual-cards",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "{\n    \"currency\": \"$currency\",\n    \"amount\": $amount,\n    \"billing_name\": \"$card_holder_name\",\n   \"callback_url\": \"$callBack/\"\n}",
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json",
                    "Authorization: Bearer " . env('SECRET_KEY')
                ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            $result = json_decode($response, true);

            if (isset($result)){
                if ( $result['status'] === 'success' && array_key_exists('data', $result) ) {

                    //Credit Card creation Charge
                    $charge = new Charge();
                    $charge->user_id = $user->id;
                    $charge->ref_id = $trx;
                    $charge->amount = $total_amount;
                    $charge->log = 'Virtual Card creation charge #';
                    $charge->save();

                    //History
                    $his = new History();
                    $his->user_id = $user->id;
                    $his->ref_id = $trx;
                    $his->amount = $total_amount;
                    $his->type = "Card Creation";
                    $his->save();

                    //Debit User
                    $user->balance = $user->balance - $total_amount;
                    $user->save();

                    //Save Card
                    $v_card = new VirtualCard();
                    $v_card->user_id = $user->id;
                    $v_card->card_id = $result['data']['id'];
                    $v_card->plan_id = $plan->id;
                    $v_card->name = $card_holder_name;
                    $v_card->account_id = $result['data']['account_id'];
                    $v_card->card_hash = $result['data']['id'];
                    $v_card->card_pan = $result['data']['card_pan'];
                    $v_card->masked_card = $result['data']['masked_pan'];
                    $v_card->cvv = $result['data']['cvv'];
                    $v_card->expiration = $result['data']['expiration'];
                    $v_card->card_type = $result['data']['card_type'];
                    $v_card->name_on_card = $result['data']['name_on_card'];
                    $v_card->callback = $result['data']['callback_url'];
                    $v_card->ref_id = $trx;
                    $v_card->secret = $trx;
                    $v_card->bg = $bg;
                    $v_card->city = $result['data']['city'];
                    $v_card->state = $result['data']['state'];
                    $v_card->zip_code = $result['data']['zip_code'];
                    $v_card->address = $result['data']['address_1'];
                    $v_card->amount = $amount;
                    $v_card->currency = $result['data']['currency'];
                    $v_card->charge = $total_amount - $amount;
                    if ($result['data']['is_active']) {
                        $v_card->is_active = 1;
                    } else {
                        $v_card->is_active = 0;
                    }
                    $v_card->funding = $plan->funding;
                    $v_card->terminate = 0;
                    $v_card->bg = $request->bg;
                    $v_card->save();

                    //delete temporary card creation request;
                    $deleteCreateCardRequest = CreateCardRequest::where('user_id', $user->id)->where('temp_id', $tempId);
                    if ($deleteCreateCardRequest->first()){
                        $deleteCreateCardRequest->delete();
                    }

                    $user = User::findOrFail(Auth::user()->id);

                    // transaction
                    $transaction = new Transaction();
                    $transaction->user_id = $user->id;
                    $transaction->amount = $amount;
                    $transaction->post_balance = $user->balance;
                    $transaction->charge = $total_amount - $amount;
                    $transaction->trx_type = '-';
                    $transaction->details = 'Purchased new card, Card No: ' . $result['data']['card_pan'];
                    $transaction->trx =  $trx;
                    $transaction->save();

                    // Admin Notification
                    $adminNotification = new AdminNotification();
                    $adminNotification->user_id = $user->id;
                    $adminNotification->title = $user->username.' has purchased '.$plan->name;
                    $adminNotification->click_url = urlPath('admin.virtualCard');
                    $adminNotification->save();

                    // Send Email
                    $type = "CARD_BUY";
                    $shortCodes = [
                        'price' => $total_amount,
                        'currency' => $v_card->currency,
                        'purchase_at' => date('d-m-Y', strtotime($v_card->created_at)),
                        'trx' => $trx,
                        'post_balance' => $v_card->amount,

                    ];
                    sendEmail($user, $type, $shortCodes);

                    $notify[] = ['success', 'Virtual card has been created successfully.'];

                    $bonus = RefferBonusSettings::find(1);



                    $refer = new RefferBonus();
                    $refer->refer_by_id = auth()->user()->ref_by;
                    $refer->new_user_id = $user->id;
                    $refer->refer_bonus = $bonus->refer_by_bonus;
                    $refer->save();
                    return redirect()->route('user.card')->withNotify($notify);
                } else {
                    $notify[] = ['warning','Please wait a moment and refresh this page.'];
                    return redirect()->route('user.card')->withNotify($notify);
                }
            }else {
                $notify[] = ['warning','Please wait a moment and refresh this page.'];
                return redirect()->route('user.card')->withNotify($notify);
            }
        } else {
            $notify[] = ['warning', 'Account balance is insufficient.'];
            return back()->withNotify($notify);
        }
    }

    public function cardCallBack(Request $request){
        $body = @file_get_contents("php://input");
        $signature = (isset($_SERVER['HTTP_VERIF_HASH']) ? $_SERVER['HTTP_VERIF_HASH'] : '');
        if (!$signature) {
            exit();
        }
        $local_signature = env('SECRET_HASH');
        if ($signature !== $local_signature) {
            exit();
        }
        http_response_code(200);
        $response = json_decode($body);
        $trx = 'VC-' . str_random(6);
        if ($response->status == 'successful') {
            $card = VirtualCard::where('card_id', $response->CardId)->first();

            if (!$card){
                $c_user_id = $request->c_user_id;
                $c_plan_id = $request->c_plan_id;
                $c_card_bg = $request->c_card_bg;
                $c_amount = $request->c_amount;
                $c_total_amount = $request->c_total_amount;
                $c_temp_id = $request->c_temp_id;
                $c_trx = $request->c_trx;

                $isHas = substr($c_trx, -1);
                if($isHas == '/'){
                    $c_trx = substr_replace($c_trx,  "", -1);
                }
                $newCard = $this->createUnsavedCard($c_user_id, $c_plan_id, $c_card_bg, $c_amount, $c_total_amount, $c_temp_id, $c_trx, $response->cardId);
            }

            $card = VirtualCard::where('card_id', $response->CardId)->first();

            if ($card) {
                $card->amount = $response->balance;
                $card->save();

                //Transactions
                $vt = new Virtualtransactions();
                $vt->user_id = $card->user_id;
                $vt->virtual_card_id = $card->id;
                $vt->card_id = $card->card_id;
                $vt->amount = $response->amount;
                $vt->description = $response->description;
                $vt->trx = $trx;
                $vt->status = $response->status;
                $vt->save();

                //History
                $his = new History();
                $his->user_id = $card->user_id;
                $his->ref_id = $trx;
                $his->amount = $response->amount;
                $his->type = $response->type;
                $his->save();
                return true;
            }
            return true;
        }
        return false;
    }

    public function createUnsavedCard($c_user_id, $c_plan_id, $c_card_bg, $c_amount, $c_total_amount, $c_temp_id, $c_trx, $cardId) {

        $c_user_id = (int) $c_user_id;
        $c_plan_id = (int) $c_plan_id;
        $c_amount = (double) $c_amount;
        $c_total_amount = (double) $c_total_amount;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => env('Flutter_wave_url')."virtual-cards/".$cardId,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authorization: Bearer " . env('SECRET_KEY')
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($response, true);
        if (array_key_exists('data', $result) && ($result['status'] === 'success')) {
            $plan = Plan::find($c_plan_id);
            //Save Card
            $v_card = new VirtualCard();
            $v_card->user_id = $c_user_id;
            $v_card->card_id = $result['data']['id'];
            $v_card->plan_id = $plan->id;
            $v_card->name = $result['data']['name_on_card'];
            $v_card->account_id = $result['data']['account_id'];
            $v_card->card_hash = $result['data']['id'];
            $v_card->card_pan = $result['data']['card_pan'];
            $v_card->masked_card = $result['data']['masked_pan'];
            $v_card->cvv = $result['data']['cvv'];
            $v_card->expiration = $result['data']['expiration'];
            $v_card->card_type = $result['data']['card_type'];
            $v_card->name_on_card = $result['data']['name_on_card'];
            $v_card->callback = $result['data']['callback_url'];
            $v_card->ref_id = $c_trx;
            $v_card->secret = $c_trx;
            $v_card->bg = $c_card_bg;
            $v_card->city = $result['data']['city'];
            $v_card->state = $result['data']['state'];
            $v_card->zip_code = $result['data']['zip_code'];
            $v_card->address = $result['data']['address_1'];
            $v_card->amount = $result['data']['amount'];
            $v_card->currency = $result['data']['currency'];
            $v_card->charge = $c_total_amount - $c_amount;
            if ($result['data']['is_active']) {
                $v_card->is_active = 1;
            } else {
                $v_card->is_active = 0;
            }
            $v_card->funding = $plan->funding;
            $v_card->terminate = 0;
            $v_card->save();


            //Credit Card creation Charge
            $charge = new Charge();
            $charge->user_id = $c_user_id;
            $charge->ref_id = $c_trx;
            $charge->amount = $c_total_amount;
            $charge->log = 'Virtual Card creation charge #';
            $charge->save();

            //History
            $his = new History();
            $his->user_id = $c_user_id;
            $his->ref_id = $c_trx;
            $his->amount = $c_total_amount;
            $his->type = "Card Creation";
            $his->save();

            //Debit User
            $user = User::find($c_user_id);
            $user->balance = $user->balance - $c_total_amount;
            $user->save();


            // transaction
            $transaction = new Transaction();
            $transaction->user_id = $user->id;
            $transaction->amount = $c_amount;
            $transaction->post_balance = $user->balance;
            $transaction->charge = $c_total_amount - $c_amount;
            $transaction->trx_type = '-';
            $transaction->details = 'Purchased new card, Card No: ' . $result['data']['card_pan'];
            $transaction->trx =  $c_trx;
            $transaction->save();

            // Send Email
            $type = "CARD_BUY";
            $shortCodes = [
                'price' => $c_total_amount,
                'currency' => $v_card->currency,
                'purchase_at' => date('d-m-Y', strtotime($v_card->created_at)),
                'trx' => $c_trx,
                'post_balance' => $v_card->amount,
            ];
            sendEmail($user, $type, $shortCodes);

            //delete temporary card creation request;
            $deleteCreateCardRequest = CreateCardRequest::where('user_id', $c_user_id)->where('temp_id', $c_temp_id)->first();
            if ($deleteCreateCardRequest){
                $deleteCreateCardRequest->status = 1;
                $deleteCreateCardRequest->save();
            }

            return true;
        }
        return false;
    }

}
