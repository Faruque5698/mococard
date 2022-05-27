<?php

namespace App\Http\Controllers;

use App\Models\CardCharge;
use App\Models\Currency;
use App\Models\RefferBonus;
use App\Models\RefferBonusSettings;
use App\Models\Trx;
use App\Models\VirtualCard;
use App\Models\Withdrawal;
use App\Models\WithdrawMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CardMoneyWithdrawController extends Controller
{

    public function currency_details($id){
        $c = Currency::find($id);
        return response()->json([
            'status'=>200,
            'data'=>$c
        ]);
    }

    public function currency(){
        $currency = Currency::where('status','=',1)->get();
        if ($currency ->isEmpty()){
            return response()->json([
               'message'=>'No currency is available'
            ]);
        }else{
            return response()->json([
               'status'=>200,
               'data'=> $currency
            ]);
        }

    }

    public function card_withdraw(Request $request){
        $rules = [
            'method_code' => 'required',
            'amount' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
            'currency_id' => 'required',
            'currency' => 'required',
            'card_no' => 'required'
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
        $bonus = VirtualCard::where('card_pan','=',$request->card_no)->first();
//        $bonus =
//        $bonus
//        return response()->json([
//            'card'=>$bonus
//        ]);
        $bonusCharge = CardCharge::find(1);
        $amountInCur = ($request->amount / $walletCurr->rate) * $method->rate;
        $charge = $bonusCharge->new_user_bonus + ($amountInCur * $method->percent_charge / 100);
        $finalAmo = $amountInCur - $charge;


        if ($finalAmo < $method->min_limit) {
            return response(['errors' => 'Your Request Amount is Smaller Then Withdraw Minimum Amount.']);
        }
        if ($finalAmo > $method->max_limit) {
            return response(['errors' => 'Your Request Amount is Larger Then Withdraw Maximum Amount.']);
        }

        if (formatter_money($request->amount) > $bonus->amount) {
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
            $response['currency_id'] = $result->currency_id;
            $response['method_essential_field']=$method->user_data;

            return response($response);
        }
    }

    public function card_withdraw_submit (Request $request){
        $rules = [
            'trx' => 'required',
            'currency_id'=>'required'
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

        $authWallet  = VirtualCard::find($withdraw->wallet_id);

        if ($withdraw->amount > $authWallet->amount) {
            return response(['errors' => 'Your Request Amount is Larger Then Your Current Balance.']);
        } else {
            $withdraw->detail = json_encode($multiInput);
            $withdraw->status = 0;
            $withdraw->save();

            $authWallet->amount =  formatter_money($authWallet->amount - $withdraw->amount);
            $authWallet->update();

            Trx::create([
                'user_id' => $authWallet->user_id,
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
}
