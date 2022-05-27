<?php

namespace App\Http\Controllers;

use App\Lib\GoogleAuthenticator;
use App\Models\AdminNotification;
use App\Models\CardCharge;
use App\Models\GeneralSetting;
use App\Models\Plan;
use App\Models\RefferBonus;
use App\Models\RefferBonusSettings;
use App\Models\SubCategory;
use App\Models\Transaction;
use App\Models\User;
use App\Models\WithdrawMethod;
use App\Models\Withdrawal;
use App\Rules\FileTypeValidate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;
use App\Models\Card;
use App\Models\VirtualCard;
use App\Models\SupportTicket;
use Carbon\Carbon;

class UserController extends Controller
{
    public function __construct()
    {
        $this->activeTemplate = activeTemplate();
    }

    public function dashboard(){
        $user = auth()->user();
        $trx = Transaction::where('user_id','=',$user->id)->get();
        $trx2 = Transaction::where('sender_id','=',$user->id)->get();
        $cards  = VirtualCard::where('user_id', Auth::user()->id)->get();
        $general = GeneralSetting::find(1);
        $apps_name=$general->sitename;
        $bonus_charge = RefferBonusSettings::find(1);
        $card_charge = CardCharge::find(1);

        $bonus = RefferBonus::where('refer_by_id','=',auth()->user()->id)->first();
        $bonus_amount = $bonus->refer_bonus;

        $base_url=url('/');
        $referral_url  = $base_url.'/'.'refer/'.auth()->user()->id.'/'.auth()->user()->username;
        $terms_condition = $base_url.'/terms-of-service/page/43';
        $privacy = $base_url.'/privacy-policy/page/42';


        return response()->json([
            'status'=>200,
            'data'=>['user'=>$user,
                'incoming_transaction'=>$trx,
                'outgoing_transaction'=>$trx2,
                'mycards'=>$cards,
                ],
            'apps_name'=>$apps_name,
            'bonus_amount'=>$bonus_amount,
            'bonus_withdraw_charge'=>$bonus_charge->new_user_bonus,
            'card_withdraw_charge'=>$card_charge->charge,
            'referral_link'=>$referral_url,
            'terms_condition'=>$terms_condition,
            'privacy'=>$privacy
        ]);
    }

    public function home()
    {
        $pageTitle = 'Dashboard';
        $user = Auth::user();
        $latestTrxs = Transaction::where('user_id', $user->id)->latest()->limit(10)->get();
        $countCard = VirtualCard::where('user_id', $user->id)->count();
        $countTrx = Transaction::where('user_id', $user->id)->count();
        $countTicket = SupportTicket::where('user_id', $user->id)->count();
//        $refer = DB::table('reffer_bonuses')->sum('refer_bonus')->where('refer_by_id', '=', auth()->user()->id);
        $refer = RefferBonus::where('refer_by_id','=',auth()->user()->id)->sum('refer_bonus');
//        return $refer;
        return view($this->activeTemplate . 'user.dashboard', compact('pageTitle', 'user', 'latestTrxs', 'countCard', 'countTrx', 'countTicket', 'refer'));
    }

    public function profile()
    {
        $pageTitle = "Profile Setting";
        $user = Auth::user();
        return view($this->activeTemplate. 'user.profile_setting', compact('pageTitle','user'));
    }

    public function submitProfile(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'address' => 'sometimes|required|max:80',
            'state' => 'sometimes|required|max:80',
            'zip' => 'sometimes|required|max:40',
            'city' => 'sometimes|required|max:50',
            'image' => ['image',new FileTypeValidate(['jpg','jpeg','png'])]
        ],[
            'firstname.required'=>'First name field is required',
            'lastname.required'=>'Last name field is required'
        ]);

        $user = Auth::user();

        $in['firstname'] = $request->firstname;
        $in['lastname'] = $request->lastname;

        $in['address'] = [
            'address' => $request->address,
            'state' => $request->state,
            'zip' => $request->zip,
            'country' => @$user->address->country,
            'city' => $request->city,
        ];


        if ($request->hasFile('image')) {
            $location = imagePath()['profile']['user']['path'];
            $size = imagePath()['profile']['user']['size'];
            $filename = uploadImage($request->image, $location, $size, $user->image);
            $in['image'] = $filename;
        }
        $user->fill($in)->save();
        $notify[] = ['success', 'Profile updated successfully.'];
        return back()->withNotify($notify);
    }

    public function changePassword()
    {
        $pageTitle = 'Change password';
        return view($this->activeTemplate . 'user.password', compact('pageTitle'));
    }

    public function submitPassword(Request $request)
    {

        $password_validation = Password::min(6);
        $general = GeneralSetting::first();
        if ($general->secure_password) {
            $password_validation = $password_validation->mixedCase()->numbers()->symbols()->uncompromised();
        }

        $this->validate($request, [
            'current_password' => 'required',
            'password' => ['required','confirmed',$password_validation]
        ]);


        try {
            $user = auth()->user();
            if (Hash::check($request->current_password, $user->password)) {
                $password = Hash::make($request->password);
                $user->password = $password;
                $user->save();
                $notify[] = ['success', 'Password changes successfully.'];
                return back()->withNotify($notify);
            } else {
                $notify[] = ['error', 'The password doesn\'t match!'];
                return back()->withNotify($notify);
            }
        } catch (\PDOException $e) {
            $notify[] = ['error', $e->getMessage()];
            return back()->withNotify($notify);
        }
    }

    /*
     *  History
     */
    public function depositHistory()
    {
        $pageTitle = 'Deposit History';
        $emptyMessage = 'No history found.';
        $logs = auth()->user()->deposits()->with(['gateway'])->orderBy('id','desc')->paginate(getPaginate());
        return view($this->activeTemplate.'user.deposit_history', compact('pageTitle', 'emptyMessage', 'logs'));
    }

    /*
     * Withdraw Operation
     */

    public function withdrawMoney()
    {
        $withdrawMethod = WithdrawMethod::where('status',1)->get();
        $pageTitle = 'Withdraw Money';
        return view($this->activeTemplate.'user.withdraw.methods', compact('pageTitle','withdrawMethod'));
    }

    public function withdrawStore(Request $request)
    {
        $this->validate($request, [
            'method_code' => 'required',
            'amount' => 'required|numeric'
        ]);
        $method = WithdrawMethod::where('id', $request->method_code)->where('status', 1)->firstOrFail();
        $user = auth()->user();
        if ($request->amount < $method->min_limit) {
            $notify[] = ['error', 'Your requested amount is smaller than minimum amount.'];
            return back()->withNotify($notify);
        }
        if ($request->amount > $method->max_limit) {
            $notify[] = ['error', 'Your requested amount is larger than maximum amount.'];
            return back()->withNotify($notify);
        }

        if ($request->amount > $user->balance) {
            $notify[] = ['error', 'You do not have sufficient balance for withdraw.'];
            return back()->withNotify($notify);
        }


        $charge = $method->fixed_charge + ($request->amount * $method->percent_charge / 100);
        $afterCharge = $request->amount - $charge;
        $finalAmount = $afterCharge * $method->rate;

        $withdraw = new Withdrawal();
        $withdraw->method_id = $method->id; // wallet method ID
        $withdraw->user_id = $user->id;
        $withdraw->amount = $request->amount;
        $withdraw->currency = $method->currency;
        $withdraw->rate = $method->rate;
        $withdraw->charge = $charge;
        $withdraw->final_amount = $finalAmount;
        $withdraw->after_charge = $afterCharge;
        $withdraw->trx = getTrx();
        $withdraw->save();
        session()->put('wtrx', $withdraw->trx);
        return redirect()->route('user.withdraw.preview');
    }

    public function withdrawPreview()
    {
        $withdraw = Withdrawal::with('method','user')->where('trx', session()->get('wtrx'))->where('status', 0)->orderBy('id','desc')->firstOrFail();
        $pageTitle = 'Withdraw Preview';
        return view($this->activeTemplate . 'user.withdraw.preview', compact('pageTitle','withdraw'));
    }


    public function withdrawSubmit(Request $request)
    {
        $general = GeneralSetting::first();
        $withdraw = Withdrawal::with('method','user')->where('trx', session()->get('wtrx'))->where('status', 0)->orderBy('id','desc')->firstOrFail();

        $rules = [];
        $inputField = [];
        if ($withdraw->method->user_data != null) {
            foreach ($withdraw->method->user_data as $key => $cus) {
                $rules[$key] = [$cus->validation];
                if ($cus->type == 'file') {
                    array_push($rules[$key], 'image');
                    array_push($rules[$key], new FileTypeValidate(['jpg','jpeg','png']));
                    array_push($rules[$key], 'max:2048');
                }
                if ($cus->type == 'text') {
                    array_push($rules[$key], 'max:191');
                }
                if ($cus->type == 'textarea') {
                    array_push($rules[$key], 'max:300');
                }
                $inputField[] = $key;
            }
        }

        $this->validate($request, $rules);

        $user = auth()->user();
        if ($user->ts) {
            $response = verifyG2fa($user,$request->authenticator_code);
            if (!$response) {
                $notify[] = ['error', 'Wrong verification code'];
                return back()->withNotify($notify);
            }
        }


        if ($withdraw->amount > $user->balance) {
            $notify[] = ['error', 'Your request amount is larger then your current balance.'];
            return back()->withNotify($notify);
        }

        $directory = date("Y")."/".date("m")."/".date("d");
        $path = imagePath()['verify']['withdraw']['path'].'/'.$directory;
        $collection = collect($request);
        $reqField = [];
        if ($withdraw->method->user_data != null) {
            foreach ($collection as $k => $v) {
                foreach ($withdraw->method->user_data as $inKey => $inVal) {
                    if ($k != $inKey) {
                        continue;
                    } else {
                        if ($inVal->type == 'file') {
                            if ($request->hasFile($inKey)) {
                                try {
                                    $reqField[$inKey] = [
                                        'field_name' => $directory.'/'.uploadImage($request[$inKey], $path),
                                        'type' => $inVal->type,
                                    ];
                                } catch (\Exception $exp) {
                                    $notify[] = ['error', 'Could not upload your ' . $request[$inKey]];
                                    return back()->withNotify($notify)->withInput();
                                }
                            }
                        } else {
                            $reqField[$inKey] = $v;
                            $reqField[$inKey] = [
                                'field_name' => $v,
                                'type' => $inVal->type,
                            ];
                        }
                    }
                }
            }
            $withdraw['withdraw_information'] = $reqField;
        } else {
            $withdraw['withdraw_information'] = null;
        }


        $withdraw->status = 2;
        $withdraw->save();
        $user->balance  -=  $withdraw->amount;
        $user->save();



        $transaction = new Transaction();
        $transaction->user_id = $withdraw->user_id;
        $transaction->amount = $withdraw->amount;
        $transaction->post_balance = $user->balance;
        $transaction->charge = $withdraw->charge;
        $transaction->trx_type = '-';
        $transaction->details = showAmount($withdraw->final_amount) . ' ' . $withdraw->currency . ' Withdraw Via ' . $withdraw->method->name;
        $transaction->trx =  $withdraw->trx;
        $transaction->save();

        $adminNotification = new AdminNotification();
        $adminNotification->user_id = $user->id;
        $adminNotification->title = 'New withdraw request from '.$user->username;
        $adminNotification->click_url = urlPath('admin.withdraw.details',$withdraw->id);
        $adminNotification->save();

        notify($user, 'WITHDRAW_REQUEST', [
            'method_name' => $withdraw->method->name,
            'method_currency' => $withdraw->currency,
            'method_amount' => showAmount($withdraw->final_amount),
            'amount' => showAmount($withdraw->amount),
            'charge' => showAmount($withdraw->charge),
            'currency' => $general->cur_text,
            'rate' => showAmount($withdraw->rate),
            'trx' => $withdraw->trx,
            'post_balance' => showAmount($user->balance),
            'delay' => $withdraw->method->delay
        ]);

        $notify[] = ['success', 'Withdraw request sent successfully'];
        return redirect()->route('user.withdraw.history')->withNotify($notify);
    }

    public function withdrawLog()
    {
        $pageTitle = "Withdraw Log";
        $withdraws = Withdrawal::where('user_id', Auth::id())->where('status', '!=', 0)->with('method')->orderBy('id','desc')->paginate(getPaginate());
        $data['emptyMessage'] = "No Data Found!";
        return view($this->activeTemplate.'user.withdraw.log', compact('pageTitle','withdraws'));
    }



    public function show2faForm()
    {
        $general = GeneralSetting::first();
        $ga = new GoogleAuthenticator();
        $user = auth()->user();
        $secret = $ga->createSecret();
        $qrCodeUrl = $ga->getQRCodeGoogleUrl($user->username . '@' . $general->sitename, $secret);
        $pageTitle = 'Two Factor';
        return view($this->activeTemplate.'user.twofactor', compact('pageTitle', 'secret', 'qrCodeUrl'));
    }

    public function create2fa(Request $request)
    {
        $user = auth()->user();
        $this->validate($request, [
            'key' => 'required',
            'code' => 'required',
        ]);
        $response = verifyG2fa($user,$request->code,$request->key);
        if ($response) {
            $user->tsc = $request->key;
            $user->ts = 1;
            $user->save();
            $userAgent = getIpInfo();
            $osBrowser = osBrowser();
            notify($user, '2FA_ENABLE', [
                'operating_system' => @$osBrowser['os_platform'],
                'browser' => @$osBrowser['browser'],
                'ip' => @$userAgent['ip'],
                'time' => @$userAgent['time']
            ]);
            $notify[] = ['success', 'Google authenticator enabled successfully'];
            return back()->withNotify($notify);
        } else {
            $notify[] = ['error', 'Wrong verification code'];
            return back()->withNotify($notify);
        }
    }


    public function disable2fa(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
        ]);

        $user = auth()->user();
        $response = verifyG2fa($user,$request->code);
        if ($response) {
            $user->tsc = null;
            $user->ts = 0;
            $user->save();
            $userAgent = getIpInfo();
            $osBrowser = osBrowser();
            notify($user, '2FA_DISABLE', [
                'operating_system' => @$osBrowser['os_platform'],
                'browser' => @$osBrowser['browser'],
                'ip' => @$userAgent['ip'],
                'time' => @$userAgent['time']
            ]);
            $notify[] = ['success', 'Two factor authenticator disable successfully'];
        } else {
            $notify[] = ['error', 'Wrong verification code'];
        }
        return back()->withNotify($notify);
    }

    public function trxLog(){
        $pageTitle = 'Transaction Logs';
        $logs  = Transaction::where('user_id', Auth::user()->id)->latest()->paginate(getPaginate());
        $emptyMessage = 'Data Not Found';
        return view($this->activeTemplate.'user.trx_log', compact('pageTitle', 'logs', 'emptyMessage'));
    }

    public function purchaseCard(Request $request){

        $request->validate([
            'id'=> 'required|exists:sub_categories,id',
            'quantity'=> 'required|gt:0|integer'
        ]);

        $user = Auth::user();
        $quantity = $request->quantity;

        $findSubCat = SubCategory::where('id', $request->id)->whereHas('category', function($q){
                                        $q->where('status', 1);
                                    })
                                    ->whereHas('card', function($q){
                                        $q->where('user_id', 0);
                                    })
                                    ->first();

        if(!$findSubCat){
            $notify[] = ['error', 'Sorry, We Do Not Have Card.'];
            return back()->withNotify($notify);
        }

        if($findSubCat->card()->count() < $quantity){
            $notify[] = ['error', 'Sorry, We Do Not Have Enough Card Available to Process Your Request.'];
            return back()->withNotify($notify);
        }

        $price = $findSubCat->price * $quantity;

        if($price > $user->balance){
            $notify[] = ['error', 'Sorry, You Do Not Have Sufficient Balance to Make this Purchase.'];
            return back()->withNotify($notify);
        }

        $trx = getTrx();

        $user->balance -= $price;
        $user->save();


        $card = Card::where('sub_category_id', $request->id)
                    ->where('user_id', 0)
                    ->orderBy('id', 'ASC')
                    ->take($quantity)
                    ->update([
                        'user_id' => $user->id,
                        'trx' => $trx,
                        'purchase_at' => Carbon::now()
                    ]);

        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->amount = $price;
        $transaction->post_balance = $user->balance;
        $transaction->charge = 00;
        $transaction->trx_type = '-';
        $transaction->details = 'Purchased '.$quantity.' '.$findSubCat->name.' successfully';
        $transaction->trx =  $trx;
        $transaction->save();

        $adminNotification = new AdminNotification();
        $adminNotification->user_id = $user->id;
        $adminNotification->title = $user->username.' has purchased '.$findSubCat->name;
        $adminNotification->click_url = urlPath('admin.users.card',$user->id);
        $adminNotification->save();

        $general = GeneralSetting::first();

        notify($user, 'CARD_BUY', [
            'trx' => $trx,
            'price' => showAmount($price, 2),
            'currency' => $general->cur_text,
            'purchase_at' => $findSubCat->purchase_at,
            'category' => $findSubCat->category->name,
            'sub_category' => $findSubCat->name,
            'quantity' => $quantity,
            'post_balance' => showAmount($transaction->post_balance, 2),
        ]);

        $notify[] = ['success', ' Purchased successfully'];
        return redirect()->route('user.card')->withNotify($notify);
    }

    public function card(){
        $pageTitle = 'My Cards';
        $cards  = VirtualCard::where('user_id', Auth::user()->id)->get();
        //return  $cards;
        foreach ($cards as $row) {
            if (!$row->terminate) {
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => env('Flutter_wave_url') . "virtual-cards/" . $row->card_id,
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
                $row->live_amount = $result['data']['amount'];
            }
        }


        return view($this->activeTemplate.'user.card', compact('pageTitle', 'cards'));
    }

    public function cardDetails($id){
        $pageTitle = 'Card Details';
        $card  = Card::where('user_id', Auth::user()->id)->where('id', $id)->with('subCategory.category')->firstOrFail();
        return view($this->activeTemplate.'user.card_details', compact('pageTitle', 'card'));
    }

    public function reload($id) {
        $card = VirtualCard::find($id);
        if ($card->funding){
            $pageTitle = 'Card Details';
            $plan = Plan::find($card->plan_id);
            return view($this->activeTemplate.'user.card-reload', compact('pageTitle', 'card', 'plan'));
        }else {
            $notify[] = ['warning','This card unable to load.'];
            return redirect()->route('user.card')->withNotify($notify);
        }
    }

    public function reloadConfirm(Request $request) {

        $card = VirtualCard::find($request->id);
        $user = Auth::user();
        $amount = $request->amount;
        $total = $request->total;
        $plan = Plan::find($card->plan_id);

        $amount_with_load_fee = ($amount + $plan->card_load_fee);
        $amount_with_load_fee_per = ($amount_with_load_fee / 100) * $plan->card_load_fee_percentage;
        $total_amount = $amount_with_load_fee + $amount_with_load_fee_per;

        if ($amount  > $plan->max_load || $amount < $plan->min_load ){
            return back();
        }

        if ($user->id == $card->user_id) {
            if ($user->balance > $total_amount) {
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => env('Flutter_wave_url') . "/virtual-cards/" . $card->card_id . "/fund",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => "{\n    \"debit_currency\": \"$card->currency\",\n    \"amount\": $amount\n}",
                    CURLOPT_HTTPHEADER => array(
                        "Content-Type: application/json",
                        "Authorization: Bearer" . env('SECRET_KEY')
                    ),
                ));

                $response = curl_exec($curl);
                curl_close($curl);
                $result = json_decode($response, true);

                if (($result['status'] === 'success')) {
                    //Transaction
                    $trx = 'VC-' . time() . rand(6, 100);

                    //addition card amount
                    $card->amount = $card->amount + $amount;
                    $card->save();

                    //subtraction user balance
                    $user->balance = $user->balance - $total_amount;
                    $user->save();


                    $user = User::findOrFail(Auth::user()->id);
                    // transaction
                    $transaction = new Transaction();
                    $transaction->user_id = $user->id;
                    $transaction->amount = $amount;
                    $transaction->post_balance = $user->balance;
                    $transaction->charge = $total_amount - $amount;
                    $transaction->trx_type = '-';
                    $transaction->details = 'Reload card, Card No: ' . $card->card_pan;
                    $transaction->trx =  $trx;
                    $transaction->save();

                    $notify[] = ['success','card reloaded successfully.'];
                    return redirect()->route('user.card')->withNotify($notify);
                }
            }else {
                $notify[] = ['warning','Insufficient Balance.'];
                return redirect()->route('user.card')->withNotify($notify);
            }
        }else {
            $notify[] = ['warning','Unauthorized.'];
            return redirect()->route('user.card')->withNotify($notify);
        }
    }

    public function cardTransaction($id) {
        $user = Auth::user();
        $card = VirtualCard::where('card_id', $id)->first();

        $start_date = date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "-12 month" ) );
        $end_date = date('Y-m-d');

        if ($user->id == $card->user_id) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL =>  env('Flutter_wave_url')."virtual-cards/".$id."/transactions?from=".date('Y-m-d',strtotime($start_date))."&to=".date('Y-m-d', strtotime($end_date))."&index=0&size=2147483647",
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

            //return $response;
            return view($this->activeTemplate.'user.card-transactions',[
                'transaction'=> json_decode($response),
                'pageTitle'=> 'Card transactions',
                'transaction_id'=>$id,
                'start_date'=>$start_date,
                'end_date'=>$end_date,
            ]);

        }else {
            $notify[] = ['warning','Unauthorized.'];
            return redirect()->route('user.card')->withNotify($notify);
        }
    }

    public function cardTransactionFilter(Request $request) {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $id = $request->card_id;

        $user = Auth::user();
        $card = VirtualCard::where('card_id', $id)->first();

        if ($user->id == $card->user_id) {
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL =>  env('Flutter_wave_url')."virtual-cards/".$id."/transactions?from=".date('Y-m-d',strtotime($start_date))."&to=".date('Y-m-d', strtotime($end_date))."&index=0&size=2147483647",
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


            return view($this->activeTemplate.'user.card-transactions',[
                'transaction'=> json_decode($response),
                'pageTitle'=> 'Card transactions',
                'transaction_id'=>$id,
                'start_date'=>$start_date,
                'end_date'=>$end_date,
            ]);

        }else {
            $notify[] = ['warning','Unauthorized.'];
            return redirect()->route('user.card')->withNotify($notify);
        }
    }

    public function terminateCard(Request $request) {
        $id = $request->card_id;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL =>  env('Flutter_wave_url')."virtual-cards/".$id."/terminate",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authorization: Bearer " . env('SECRET_KEY')
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($response, true);

        if (isset($result)) {
            if ($result['status'] === 'success') {
                $card = VirtualCard::where('card_id', $id)->first();
                $card->terminate = 1;
                $card->save();
                $notify[] = ['success','Virtual card terminated successfully.'];
            }else{
                $notify[] = ['error','Something went wrong.'];
            }
        }

        return back()->withNotify($notify);

    }
}





