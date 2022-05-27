<?php

namespace App\Http\Controllers;

use App\Models\CardCharge;
use App\Models\Currency;
use App\Models\GatewayCurrency;
use App\Models\GeneralSetting;
use App\Models\MyReferralBonus;
use App\Models\RefferBonus;
use App\Models\RefferBonusSettings;
use App\Models\Transaction;
use App\Models\Trx;
use App\Models\User;
use App\Models\VirtualCard;
use App\Models\Wallet;
use App\Models\Withdrawal;
use App\Models\WithdrawMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserWithdrawMoneyController extends Controller
{
    public function add_money_to_main_balance_from_card(Request $request){
        $request->validate([
           'card_id'=>'required',
           'amount'=>'required'
        ]);
        $amount = $request->amount;
        $user = auth()->user();

//        return response($user->balance);

        $cards = VirtualCard::where('card_id','=',$request->card_id)->first();

//        return response([
//           'cards'=>$cards->funding
//        ]);
        if ($cards){
            if ($cards->user_id == $user->id){
                if ($cards->funding == 1){
                    if ($user->balance > $amount) {
//                $charge = CardCharge::find(1);
//                $total_amount = $amount + $charge->charge;
                        $cards->amount = $cards->amount + $amount;
                        $cards->save();

                        $user->balance = $user->balance - $amount;
                        $user->save();

                        $w = Wallet::where('user_id', '=', $user->id)->first();
                        $w->amount = $w->amount - $amount;
                        $w->save();

                        $transaction = new Transaction();
                        $transaction->user_id = auth()->user()->id;
                        $transaction->sender_id = $cards->card_pan;
                        $transaction->amount = $amount;
                        $transaction->post_balance = $user->balance;
                        $transaction->charge = 0;
                        $transaction->trx_type = '-';
                        $transaction->details = 'Added Card Balance Via Main Balance';
                        $transaction->trx =  null;
                        $transaction->save();

                        return response()->json([
                            'status' => 200,
                            'user' => $user,
                            'cards_details' => $cards,
                        ]);
                    }else{
                        return response()->json([

                            'error'=>'Insufficient Balance Account'
                        ]);
                    }
                }else{
                    return response()->json([

                        'error'=>'Its Not a Rechargeable card'
                    ]);
                }

            }else{
                return response()->json([
                    'error'=>'That is not your card'
                ]);
            }
        }else{
            return response()->json([
                'error'=>'Card not found'
            ]);
        }

    }



    public function index(){
        $currency = Currency::whereStatus(1)->get();
        $pageTitle = 'Withdraw';
        $gatewayCurrency = WithdrawMethod::where('status','=',1)->get();
        return view('templates.basic.withdraw.withdraw_method',[
            'pageTitle'=>$pageTitle,
            'gatewayCurrency'=>$gatewayCurrency,
            'currency'=>$currency
        ]);
    }
    public function index2(){
        $currency = Currency::whereStatus(1)->get();
        $pageTitle ='Bonus Withdraw';
        $gatewayCurrency = WithdrawMethod::where('status','=',1)->get();
        return view('templates.basic.withdraw.withdraw_method2',[
            'pageTitle'=>$pageTitle,
            'gatewayCurrency'=>$gatewayCurrency,
            'currency'=>$currency
        ]);
    }

    public function pro(Request $request){
//        return response('success');
        $c = Currency::find($request->id);
        $code = $c->code;
        return response()->json([
            'currency'=>$code
        ]);

    }

    public function withdraw_confirm( Request $request){
        $rules = [
            'method_code' => 'required',
            'amount' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
//            'currency_id' => 'required',
            'currency' => 'required'
        ];
        $pageTitle = 'Withdraw Confirm';
//        $currency1 = Currency::find($request->currency_id);
//        $currency = $currency1->code;
        $currency_id = 1;

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all(), 422]);
        }


        $method = WithdrawMethod::where('id', $request->method_code)->where('status', 1)->first();
        if(!$method){
//            return response(['errors' => 'Invalid Method.']);
            $notify[] = ['error', 'Invalid Method'];
            return back()->withNotify($notify);
        }

        $walletCurr = Currency::where('id', $currency_id)->where('status', 1)->first();
//        return $walletCurr;
        if(!$walletCurr){
//            return response(['errors' => 'Invalid Currency.']);
            $notify[] = ['error', 'Invalid Currency'];
            return back()->withNotify($notify);
        }

//        return $walletCurr->id;
        $user = Auth::id();
//        return $user;


        $authWallet = Wallet::where('wallet_id','=' ,$walletCurr->id)->where('user_id','=', $user)->first();
//        return $authWallet;
        if(!$authWallet){
//            return response(['errors' => 'Invalid Wallet.']);
            $notify[] = ['error', 'Invalid Wallet'];
            return back()->withNotify($notify);

        }


        $amountInCur = ($request->amount / $walletCurr->rate) * $method->rate;
        $charge = $method->fixed_charge + ($amountInCur * $method->percent_charge / 100);
        $finalAmo = $amountInCur - $charge;


        if ($finalAmo < $method->min_limit) {
            $notify[] = ['error', 'Your Request Amount is Smaller Then Withdraw Minimum Amount.'];
            return back()->withNotify($notify);
//            return response(['errors' => 'Your Request Amount is Smaller Then Withdraw Minimum Amount.']);
        }
        if ($finalAmo > $method->max_limit) {
            $notify[] = ['error', 'Your Request Amount is Larger Then Withdraw Maximum Amount.'];
            return back()->withNotify($notify);
//            return response(['errors' => 'Your Request Amount is Larger Then Withdraw Maximum Amount.']);
        }

        if (formatter_money($request->amount) > $authWallet->amount) {
            $notify[] = ['error', 'Your Request Amount is Larger Then Your Current Balance.'];
            return back()->withNotify($notify);
//            return response(['errors' => 'Your Request Amount is Larger Then Your Current Balance.']);
        } else {
            $w['method_id'] = $method->id; // wallet method ID
            $w['user_id'] = Auth::id();
            $w['wallet_id'] = $authWallet->id; // User Wallet ID
            $w['currency_id'] = $walletCurr->id; // Currency ID
            $w['amount'] = formatter_money($request->amount);
            $w['currency'] = $method->currency;
            $w['method_rate'] = $method->rate;
            $w['currency_rate'] = $walletCurr->rate;
            $w['charge'] = $charge;
            $w['wallet_charge'] = $charge* $walletCurr->rate;
            $w['final_amount'] = $finalAmo;
            $w['delay'] = $method->delay;

            $multiInput = [];
            if ($method->user_data != null) {
                foreach ($method->user_data as $k => $val) {
                    $multiInput[str_replace(' ', '_', $val)] = null;
                }
            }
            $w['detail'] = json_encode($multiInput);
            $w['trx'] = getTrx();
            $w['status'] = -1;

            $result = Withdrawal::create($w);

            $response['result'] = true;
            $response['trx'] = $result->trx;
            return view('templates.basic.withdraw.confiramtion',[
                'response'=>$response,
                'pageTitle'=>$pageTitle
            ]);
        }
    }

    public function withdraw_confirm2( Request $request){
        $rules = [
            'method_code' => 'required',
            'amount' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
//            'currency_id' => 'required',
            'currency' => 'required'
        ];
        $pageTitle = 'Withdraw Confirm';
//        $currency1 = Currency::find($request->currency_id);
//        $currency = $currency1->code;
        $currency_id = 1;

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all(), 422]);
        }


        $method = WithdrawMethod::where('id', $request->method_code)->where('status', 1)->first();
        if(!$method){
//            return response(['errors' => 'Invalid Method.']);
            $notify[] = ['error', 'Invalid Method'];
            return back()->withNotify($notify);
        }

        $walletCurr = Currency::where('id', $currency_id)->where('status', 1)->first();
//        return $walletCurr;
        if(!$walletCurr){
//            return response(['errors' => 'Invalid Currency.']);
            $notify[] = ['error', 'Invalid Currency'];
            return back()->withNotify($notify);
        }

//        return $walletCurr->id;
        $user = Auth::id();
//        return $user;


        $authWallet = Wallet::where('wallet_id','=' ,$walletCurr->id)->where('user_id','=', $user)->first();
//        return $authWallet;
        if(!$authWallet){
//            return response(['errors' => 'Invalid Wallet.']);
            $notify[] = ['error', 'Invalid Wallet'];
            return back()->withNotify($notify);

        }


        $amountInCur = ($request->amount / $walletCurr->rate) * $method->rate;
        $charge = $method->fixed_charge + ($amountInCur * $method->percent_charge / 100);
        $finalAmo = $amountInCur - $charge;


        if ($finalAmo < $method->min_limit) {
            $notify[] = ['error', 'Your Request Amount is Smaller Then Withdraw Minimum Amount.'];
            return back()->withNotify($notify);
//            return response(['errors' => 'Your Request Amount is Smaller Then Withdraw Minimum Amount.']);
        }
        if ($finalAmo > $method->max_limit) {
            $notify[] = ['error', 'Your Request Amount is Larger Then Withdraw Maximum Amount.'];
            return back()->withNotify($notify);
//            return response(['errors' => 'Your Request Amount is Larger Then Withdraw Maximum Amount.']);
        }

        if (formatter_money($request->amount) > $authWallet->amount) {
            $notify[] = ['error', 'Your Request Amount is Larger Then Your Current Balance.'];
            return back()->withNotify($notify);
//            return response(['errors' => 'Your Request Amount is Larger Then Your Current Balance.']);
        } else {
            $w['method_id'] = $method->id; // wallet method ID
            $w['user_id'] = Auth::id();
            $w['wallet_id'] = $authWallet->id; // User Wallet ID
            $w['currency_id'] = $walletCurr->id; // Currency ID
            $w['amount'] = formatter_money($request->amount);
            $w['currency'] = $method->currency;
            $w['method_rate'] = $method->rate;
            $w['currency_rate'] = $walletCurr->rate;
            $w['charge'] = $charge;
            $w['wallet_charge'] = $charge* $walletCurr->rate;
            $w['final_amount'] = $finalAmo;
            $w['delay'] = $method->delay;

            $multiInput = [];
            if ($method->user_data != null) {
                foreach ($method->user_data as $k => $val) {
                    $multiInput[str_replace(' ', '_', $val)] = null;
                }
            }
            $w['detail'] = json_encode($multiInput);
            $w['trx'] = getTrx();
            $w['status'] = -1;

            $result = Withdrawal::create($w);

            $response['result'] = true;
            $response['trx'] = $result->trx;
            return view('templates.basic.withdraw.confiramtion',[
                'response'=>$response,
                'pageTitle'=>$pageTitle
            ]);
        }
    }

    public function withdraw_confirm_done(Request $request){
        $rules = [
            'trx' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $notify[] = ['error','invalid'];
            return back()->withNotify($notify);
//            return response(['errors' =>$validator->errors()->all()],422);
        }
        $withdraw = Withdrawal::with('method','curr','wallet')->where('trx',$request->trx)->where('status',-1)->latest()->first();
        if(!$withdraw){
            $notify[] = ['error', 'Invalid Request.'];
            return back()->withNotify($notify);
//            return response(['errors' => 'Invalid Request.']);
        }
        $customField = [];
        foreach (json_decode($withdraw->detail) as $k => $val){
            $customField[$k] =  ['required'];
        }
        $validator = Validator::make($request->all(), $customField);
        if ($validator->fails()) {
            $notify[] = ['error', 'invalid fields'];
            return back()->withNotify($notify);
//            return response(['errors' =>$validator->errors()->all()],422);
        }

        $in = $request->except('_token');
        $multiInput = [];
        foreach ($in as $k => $val){
            $multiInput[$k] =  $val;
        }

        $authWallet  = Wallet::find($withdraw->wallet_id);

        if ($withdraw->amount > $authWallet->amount) {
            $notify[] = ['error','Your Request Amount is Larger Then Your Current Balance.'];
            return back()->withNotify($notify);
//            return response(['errors' => 'Your Request Amount is Larger Then Your Current Balance.']);
        } else {
            $withdraw->detail = json_encode($multiInput);
            $withdraw->status = 0;
            $withdraw->save();

            $authWallet->amount =  formatter_money($authWallet->amount - $withdraw->amount);
            $authWallet->update();

            Trx::create([
                'user_id' => $authWallet->user->id,
                'amount' => $withdraw->amount,
                'main_amo' => $authWallet->amount,
                'charge' => $withdraw->wallet_charge,
                'currency_id' => $authWallet->currency->id,
                'trx_type' => '-',
                'remark' => 'Withdraw Money ',
                'title' => formatter_money($withdraw->final_amount). ' '. $withdraw->currency .' Withdraw Via ' . $withdraw->method->name,
                'trx' => $withdraw->trx
            ]);
            notify($authWallet->user, $type = 'withdraw_request', [
                'amount' => formatter_money($withdraw->amount),
                'currency' => $withdraw->curr->code,
                'withdraw_method' => $withdraw->method->name,
                'method_amount' => formatter_money($withdraw->final_amount),
                'method_currency' => $withdraw->currency,
                'duration' => $withdraw->delay,
                'trx' => $withdraw->trx,
            ]);
            $user = auth()->user();
            $user->balance = $authWallet->amount;
            $user->save();
            $response = ['success' => "Withdraw Request Successfully Send"];
            $response['result'] = true;
            $notify[] = ['success','Withdraw Request Sent'];

            return redirect()->route('user.home')->withNotify($notify);
        }
    }





//    public function withdrawMoney()
//    {
//        $basic = GeneralSetting::first();
//        if($basic->withdraw_status == 0){
//            return response(['errors' => 'Withdraw Money DeActive By Admin']);
//        }
//        $response['currency'] = Currency::whereStatus(1)->get();
//        $response['withdrawMethod'] = WithdrawMethod::whereStatus(1)->get()->map(function ($data){
//            return [
//                "id" => $data->id,
//                "name" => $data->name,
//                "min_limit" => $data->min_limit,
//                "max_limit" => $data->max_limit,
//                "delay" => $data->delay,
//                "fixed_charge" => $data->fixed_charge,
//                "percent_charge" => $data->percent_charge,
//                "rate" => $data->rate,
//                "image" => $data->image,
//                "currency" => $data->currency,
//                "user_data" => $data->user_data
//            ];
//        });
//        return response($response,200);
//    }
//
//    public function withdrawMoneyRequest(Request $request)
//    {
//
//        $rules = [
//            'method_code' => 'required',
//            'amount' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
//            'currency_id' => 'required',
//            'currency' => 'required'
//        ];
//        $validator = Validator::make($request->all(), $rules);
//        if ($validator->fails()) {
//            return response(['errors' => $validator->errors()->all(), 422]);
//        }
//
//
//        $method = WithdrawMethod::where('id', $request->method_code)->where('status', 1)->first();
//        if(!$method){
//            return response(['errors' => 'Invalid Method.']);
//        }
//
//        $walletCurr = Currency::where('id', $request->currency_id)->where('status', 1)->first();
//        if(!$walletCurr){
//            return response(['errors' => 'Invalid Currency.']);
//        }
//
//
//        $authWallet = Wallet::where('wallet_id', $walletCurr->id)->where('user_id', Auth::id())->first();
//        if(!$authWallet){
//            return response(['errors' => 'Invalid Wallet.']);
//        }
//
//
//        $amountInCur = ($request->amount / $walletCurr->rate) * $method->rate;
//        $charge = $method->fixed_charge + ($amountInCur * ($method->percent_charge / 100));
//        $finalAmo = $amountInCur - $charge;
//
//
//        if ($request->amount < $method->min_limit) {
//            return response(['errors' => 'Your Request Amount is Smaller Then Withdraw Minimum Amount.']);
//        }
//        if ($request->amount > $method->max_limit) {
//            return response(['errors' => 'Your Request Amount is Larger Then Withdraw Maximum Amount.']);
//        }
//
//        if ($request->amount > $authWallet->amount) {
//            return response(['errors' => 'Your Request Amount is Larger Then Your Current Balance.']);
//        } else {
//            $w['method_id'] = $method->id; // wallet method ID
//            $w['user_id'] = Auth::id();
//            $w['wallet_id'] = $authWallet->id; // User Wallet ID
//            $w['currency_id'] = $walletCurr->id; // Currency ID
//            $w['amount'] = $request->amount;
//            $w['currency'] = $method->currency;
//            $w['method_rate'] = $method->rate;
//            $w['currency_rate'] = $walletCurr->rate;
//            $w['charge'] = $charge;
//            $w['wallet_charge'] = $charge* $walletCurr->rate;
//            $w['final_amount'] = $finalAmo;
//            $w['delay'] = $method->delay;
//
//            $multiInput = [];
//            if ($method->user_data != null) {
//                foreach ($method->user_data as $k => $val) {
//                    $multiInput[str_replace(' ', '_', $val)] = null;
//                }
//            }
//            $w['detail'] = json_encode($multiInput);
//            $w['trx'] = getTrx();
//            $w['status'] = -1;
//
//            $result = Withdrawal::create($w);
//
//            $response['result'] = true;
//            $response['trx'] = $result->trx;
//            return response($response);
//        }
//    }
//
//
//    public function withdrawReqPreview($wtrx){
//
//        $basic = GeneralSetting::first();
//        if($basic->withdraw_status == 0){
//            return response(['errors' => 'Withdraw Money DeActive By Admin']);
//        }
//        $withdraw = Withdrawal::with('method','curr','wallet')->where('trx',$wtrx)->where('status',-1)->latest()->first();
//        if(!$withdraw){
//            return response(['errors' => 'Invalid Request!']);
//        }
//
//        $response['trx'] = $wtrx;
//        $response['current_balance'] = $withdraw->wallet->amount . ' '.$withdraw->curr->code;
//        $response['request_amount'] = $withdraw->amount  . ' '.$withdraw->curr->code;
//        $response['withdrawal_charge'] = $withdraw->charge . ' '.$withdraw->currency;
//        $response['you_will_get'] = $withdraw->final_amount . ' '.$withdraw->currency;
//        $response['available_balance'] = $withdraw->wallet->amount - $withdraw->amount . ' '.$withdraw->curr->code;
//
//        $form = [];
//        foreach(json_decode($withdraw->detail) as $k=> $value){
//            $form_field = [
//                'level' => str_replace('_',' ',$k),
//                'field_name' => $k,
//            ];
//            array_push($form,$form_field);
//        }
//        $response['form'] = $form;
//        return response($response,200);
//    }
//
//
//    public function withdrawReqSubmit(Request $request)
//    {
//        $rules = [
//            'trx' => 'required'
//        ];
//        $validator = Validator::make($request->all(), $rules);
//        if ($validator->fails()) {
//            return response(['errors' =>$validator->errors()->all()],422);
//        }
//        $withdraw = Withdrawal::with('method','curr','wallet')->where('trx',$request->trx)->where('status',-1)->latest()->first();
//        if(!$withdraw){
//            return response(['errors' => 'Invalid Request.']);
//        }
//        $customField = [];
//        foreach (json_decode($withdraw->detail) as $k => $val){
//            $customField[$k] =  ['required'];
//        }
//        $validator = Validator::make($request->all(), $customField);
//        if ($validator->fails()) {
//            return response(['errors' =>$validator->errors()->all()],422);
//        }
//
//        $in = $request->except('_token');
//        $multiInput = [];
//        foreach ($in as $k => $val){
//            $multiInput[$k] =  $val;
//        }
//
//        $authWallet  = Wallet::find($withdraw->wallet_id);
//
//        if ($withdraw->amount > $authWallet->amount) {
//            return response(['errors' => 'Your Request Amount is Larger Then Your Current Balance.']);
//        } else {
//            $withdraw->detail = json_encode($multiInput);
//            $withdraw->status = 0;
//            $withdraw->save();
//
//            $authWallet->amount =  $authWallet->amount - $withdraw->amount;
//            $authWallet->update();
//
//            Trx::create([
//                'user_id' => $authWallet->user->id,
//                'amount' => $withdraw->amount,
//                'main_amo' => $authWallet->amount,
//                'charge' => $withdraw->wallet_charge,
//                'currency_id' => $authWallet->currency->id,
//                'trx_type' => '-',
//                'remark' => 'Withdraw Money ',
//                'title' => $withdraw->final_amount. ' '. $withdraw->currency .' Withdraw Via ' . $withdraw->method->name,
//                'trx' => $withdraw->trx
//            ]);
//            notify($authWallet->user, $type = 'withdraw_request', [
//                'amount' => $withdraw->amount,
//                'currency' => $withdraw->curr->code,
//                'withdraw_method' => $withdraw->method->name,
//                'method_amount' => $withdraw->final_amount,
//                'method_currency' => $withdraw->currency,
//                'duration' => $withdraw->delay,
//                'trx' => $withdraw->trx,
//            ]);
//            $user = auth()->user();
//            $user->balance = $authWallet->amount;
//            $user->save();
//            $response = ['success' => "Withdraw Request Successfully Send"];
//            $response['result'] = true;
//            return response($response);
//        }
//    }
//
//
//
//    public function withdrawLog()
//    {
//        $logs = Withdrawal::where('user_id',Auth::id())->where('status','!=',-1)->latest()->paginate(20);
//        $logs = resourcePaginate($logs, function ($data) use ($logs) {
//            if($data->status == 0){
//                $level = 'Pending';
//            }elseif ($data->status == 1){
//                $level = 'Completed';
//            }elseif ($data->status == 2){
//                $level = 'Rejected';
//            }
//            return [
//                'transaction' => $data->trx,
//                'gateway' => $data->method->name,
//                'amount' => $data->amount . ' '.$data->curr->code,
//                'date' =>date('d M, Y h:i:s A', strtotime($data->created_at)),
//                'level' =>$level,
//                'status' =>$data->status
//            ];
//        });
//        return response($logs,200);
//    }
    public function withdrawMoney()
    {
        $basic = GeneralSetting::first();
        if($basic->withdraw_status == 0){
            return response(['errors' => 'Withdraw Money DeActive By Admin']);
        }
        $response['currency'] = Currency::whereStatus(1)->get();
        $response['withdrawMethod'] = WithdrawMethod::whereStatus(1)->get()->map(function ($data){
            return [
                "id" => $data->id,
                "name" => $data->name,
                "min_limit" => formatter_money($data->min_limit),
                "max_limit" => formatter_money($data->max_limit),
                "delay" => $data->delay,
                "fixed_charge" => formatter_money($data->fixed_charge),
                "percent_charge" => formatter_money($data->percent_charge),
                "rate" => $data->rate,
                "image" => get_image(config('constants.withdraw.method.path').'/'. $data->image),
                "currency" => $data->currency,
                "user_data" => $data->user_data
            ];
        });
        return response($response,200);
    }

    public function withdrawMoneyRequest(Request $request)
    {

        $rules = [
            'method_code' => 'required',
            'amount' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
            'currency_id' => 'required',
            'currency' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all(), 422]);
        }


        $method = WithdrawMethod::where('id', $request->method_code)->where('status', 1)->first();
        if(!$method){
            return response(['errors' => 'Invalid Method.']);
        }

        $walletCurr = Currency::where('id', $request->currency_id)->where('status', 1)->first();
        if(!$walletCurr){
            return response(['errors' => 'Invalid Currency.']);
        }


        $authWallet = Wallet::where('wallet_id', $walletCurr->id)->where('user_id', Auth::id())->first();
        if(!$authWallet){
            return response(['errors' => 'Invalid Wallet.']);
        }


        $amountInCur = ($request->amount / $walletCurr->rate) * $method->rate;
        $charge = $method->fixed_charge + ($amountInCur * $method->percent_charge / 100);
        $finalAmo = $amountInCur - $charge;


        if ($finalAmo < $method->min_limit) {
            return response(['errors' => 'Your Request Amount is Smaller Then Withdraw Minimum Amount.']);
        }
        if ($finalAmo > $method->max_limit) {
            return response(['errors' => 'Your Request Amount is Larger Then Withdraw Maximum Amount.']);
        }

        if (formatter_money($request->amount) > $authWallet->amount) {
            return response(['errors' => 'Your Request Amount is Larger Then Your Current Balance.']);
        } else {
            $w['method_id'] = $method->id; // wallet method ID
            $w['user_id'] = Auth::id();
            $w['wallet_id'] = $authWallet->id; // User Wallet ID
            $w['currency_id'] = $walletCurr->id; // Currency ID
            $w['amount'] = formatter_money($request->amount);
            $w['currency'] = $method->currency;
            $w['method_rate'] = $method->rate;
            $w['currency_rate'] = $walletCurr->rate;
            $w['charge'] = $charge;
            $w['wallet_charge'] = $charge* $walletCurr->rate;
            $w['final_amount'] = $finalAmo;
            $w['delay'] = $method->delay;

            $multiInput = [];
            if ($method->user_data != null) {
                foreach ($method->user_data as $k => $val) {
                    $multiInput[str_replace(' ', '_', $val)] = null;
                }
            }
            $w['detail'] = json_encode($multiInput);
            $w['trx'] = getTrx();
            $w['status'] = -1;

            $result = Withdrawal::create($w);

            $response['result'] = true;
            $response['trx'] = $result->trx;
            return response($response);
        }
    }public function withdrawBonusMoneyRequest(Request $request)
    {

        $rules = [
            'method_code' => 'required',
            'amount' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
            'currency_id' => 'required',
            'currency' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all(), 422]);
        }


        $method = WithdrawMethod::where('id', $request->method_code)->where('status', 1)->first();
        if(!$method){
            return response(['errors' => 'Invalid Method.']);
        }

        $walletCurr = Currency::where('id', $request->currency_id)->where('status', 1)->first();
        if(!$walletCurr){
            return response(['errors' => 'Invalid Currency.']);
        }


//        $authWallet = Wallet::where('wallet_id', $walletCurr->id)->where('user_id', Auth::id())->first();
//        if(!$authWallet){
//            return response(['errors' => 'Invalid Wallet.']);
//        }
        $bonus = RefferBonus::where('refer_by_id','=',auth()->user()->id)->first();
//        $bonus =
//        $bonus
        $bonusCharge = RefferBonusSettings::find(1);
        $amountInCur = ($request->amount / $walletCurr->rate) * $method->rate;
        $charge = $bonusCharge->new_user_bonus + ($amountInCur * $method->percent_charge / 100);
        $finalAmo = $amountInCur - $charge;


        if ($finalAmo < $method->min_limit) {
            return response(['errors' => 'Your Request Amount is Smaller Then Withdraw Minimum Amount.']);
        }
        if ($finalAmo > $method->max_limit) {
            return response(['errors' => 'Your Request Amount is Larger Then Withdraw Maximum Amount.']);
        }

        if (formatter_money($request->amount) > $bonus->refer_bonus) {
            return response(['errors' => 'Your Request Amount is Larger Then Your Bonus Balance.']);
        } else {
            $w['method_id'] = $method->id; // wallet method ID
            $w['user_id'] = Auth::id();
            $w['wallet_id'] = $bonus->id; // User Wallet ID
            $w['currency_id'] = $walletCurr->id; // Currency ID
            $w['amount'] = formatter_money($request->amount);
            $w['currency'] = $method->currency;
            $w['method_rate'] = $method->rate;
            $w['currency_rate'] = $walletCurr->rate;
            $w['charge'] = $charge;
            $w['wallet_charge'] = $charge* $walletCurr->rate;
            $w['final_amount'] = $finalAmo;
            $w['delay'] = $method->delay;

            $multiInput = [];
            if ($method->user_data != null) {
                foreach ($method->user_data as $k => $val) {
                    $multiInput[str_replace(' ', '_', $val)] = null;
                }
            }
            $w['detail'] = json_encode($multiInput);
            $w['trx'] = getTrx();
            $w['status'] = -1;

            $result = Withdrawal::create($w);

//            $bonus->refer->bonus

            $response['result'] = true;
            $response['trx'] = $result->trx;
            $response['currency_id'] = $request->currency;
            $response['method_essential_field']=$method->user_data;

            return response($response);
        }
    }


    public function withdrawReqPreview($wtrx){

        $basic = GeneralSetting::first();
        if($basic->withdraw_status == 0){
            return response(['errors' => 'Withdraw Money DeActive By Admin']);
        }
        $withdraw = Withdrawal::with('method','curr','wallet')->where('trx',$wtrx)->where('status',-1)->latest()->first();
        if(!$withdraw){
            return response(['errors' => 'Invalid Request!']);
        }

        $response['trx'] = $wtrx;
        $response['current_balance'] = formatter_money($withdraw->wallet->amount) . ' '.$withdraw->curr->code;
        $response['request_amount'] = formatter_money($withdraw->amount ) . ' '.$withdraw->curr->code;
        $response['withdrawal_charge'] = formatter_money($withdraw->charge) . ' '.$withdraw->currency;
        $response['you_will_get'] = formatter_money($withdraw->final_amount) . ' '.$withdraw->currency;
        $response['available_balance'] = formatter_money($withdraw->wallet->amount - $withdraw->amount) . ' '.$withdraw->curr->code;

        $form = [];
        foreach(json_decode($withdraw->detail) as $k=> $value){
            $form_field = [
                'level' => str_replace('_',' ',$k),
                'field_name' => $k,
            ];
            array_push($form,$form_field);
        }
        $response['form'] = $form;
        return response($response,200);
    }


    public function withdrawReqSubmit(Request $request)
    {
        $rules = [
            'trx' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response(['errors' =>$validator->errors()->all()],422);
        }
        $withdraw = Withdrawal::with('method','curr','wallet')->where('trx',$request->trx)->where('status',-1)->latest()->first();
        if(!$withdraw){
            return response(['errors' => 'Invalid Request.']);
        }
        $customField = [];
        foreach (json_decode($withdraw->detail) as $k => $val){
            $customField[$k] =  ['required'];
        }
        $validator = Validator::make($request->all(), $customField);
        if ($validator->fails()) {
            return response(['errors' =>$validator->errors()->all()],422);
        }

        $in = $request->except('_token');
        $multiInput = [];
        foreach ($in as $k => $val){
            $multiInput[$k] =  $val;
        }

        $authWallet  = Wallet::find($withdraw->wallet_id);

        if ($withdraw->amount > $authWallet->amount) {
            return response(['errors' => 'Your Request Amount is Larger Then Your Current Balance.']);
        } else {
            $withdraw->detail = json_encode($multiInput);
            $withdraw->status = 0;
            $withdraw->save();

            $authWallet->amount =  formatter_money($authWallet->amount - $withdraw->amount);
            $authWallet->update();

            Trx::create([
                'user_id' => $authWallet->user->id,
                'amount' => $withdraw->amount,
                'main_amo' => $authWallet->amount,
                'charge' => $withdraw->wallet_charge,
                'currency_id' => $authWallet->currency->id,
                'trx_type' => '-',
                'remark' => 'Withdraw Money ',
                'title' => formatter_money($withdraw->final_amount). ' '. $withdraw->currency .' Withdraw Via ' . $withdraw->method->name,
                'trx' => $withdraw->trx
            ]);
            notify($authWallet->user, $type = 'withdraw_request', [
                'amount' => formatter_money($withdraw->amount),
                'currency' => $withdraw->curr->code,
                'withdraw_method' => $withdraw->method->name,
                'method_amount' => formatter_money($withdraw->final_amount),
                'method_currency' => $withdraw->currency,
                'duration' => $withdraw->delay,
                'trx' => $withdraw->trx,
            ]);
            $user = auth()->user();
            $user->balance = $authWallet->amount;
            $user->save();
            $response = ['success' => "Withdraw Request Successfully Send"];
            $response['result'] = true;
            return response($response);
        }
    }
    public function withdrawBonusReqSubmit(Request $request)
    {
        $rules = [
            'trx' => 'required',
            'currency_id' => 'required',

        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response(['errors' =>$validator->errors()->all()],422);
        }
        $withdraw = Withdrawal::with('method','curr','wallet')->where('trx',$request->trx)->where('status',-1)->latest()->first();
        if(!$withdraw){
            return response(['errors' => 'Invalid Request.']);
        }
        $customField = [];
        foreach (json_decode($withdraw->detail) as $k => $val){
            $customField[$k] =  ['required'];
        }
        $validator = Validator::make($request->all(), $customField);
        if ($validator->fails()) {
            return response(['errors' =>$validator->errors()->all()],422);
        }

        $in = $request->except('_token');
        $multiInput = [];
        foreach ($in as $k => $val){
            $multiInput[$k] =  $val;
        }

        $authWallet  = RefferBonus::find($withdraw->wallet_id);

        if ($withdraw->amount > $authWallet->refer_bonus) {
            return response(['errors' => 'Your Request Amount is Larger Then Your Current Balance.']);
        } else {
            $withdraw->detail = json_encode($multiInput);
            $withdraw->status = 0;
            $withdraw->save();

            $authWallet->refer_bonus =  formatter_money($authWallet->refer_bonus - $withdraw->amount);
            $authWallet->update();

            Trx::create([
                'user_id' => $authWallet->refer_by_id,
                'amount' => $withdraw->amount,
                'main_amo' => $authWallet->amount,
                'charge' => $withdraw->wallet_charge,
                'currency_id' => $request->currency_id,
                'trx_type' => '-',
                'remark' => 'Withdraw Money ',
                'title' => formatter_money($withdraw->final_amount). ' '. $withdraw->currency .' Withdraw Via ' . $withdraw->method->name,
                'trx' => $withdraw->trx
            ]);
            notify($authWallet->user, $type = 'withdraw_request', [
                'amount' => formatter_money($withdraw->amount),
                'currency' => 'USD',
                'withdraw_method' => $withdraw->method->name,
                'method_amount' => formatter_money($withdraw->final_amount),
                'method_currency' => $withdraw->currency,
                'duration' => $withdraw->delay,
                'trx' => $withdraw->trx,
            ]);
//            $user = auth()->user();
//            $user->balance = $authWallet->amount;
//            $user->save();
            $response = ['success' => "Withdraw Request Successfully Send"];
            $response['result'] = true;
            return response($response);
        }
    }



    public function withdrawLog()
    {
        $logs = Withdrawal::where('user_id',Auth::id())->where('status','!=',-1)->latest()->paginate(20);
        $logs = resourcePaginate($logs, function ($data) use ($logs) {
            if($data->status == 0){
                $level = 'Pending';
            }elseif ($data->status == 1){
                $level = 'Completed';
            }elseif ($data->status == 2){
                $level = 'Rejected';
            }
            return [
                'transaction' => $data->trx,
                'gateway' => $data->method->name,
                'amount' => formatter_money($data->amount) ,
                'date' =>date('d M, Y h:i:s A', strtotime($data->created_at)),
                'level' =>$level,
                'status' =>$data->status
            ];
        });
        return response($logs,200);
    }

}
