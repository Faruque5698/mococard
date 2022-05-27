<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use App\Models\VirtualCard;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SendMoneyController extends Controller
{
    public function cards(){
        $cards  = VirtualCard::where('user_id', Auth::user()->id)->get();
        if ($cards -> isEmpty()){
            return response()->json([
                'status'=>200,
                'message'=>'You did not purchase any card yet'
            ]);

        }else{
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
//                $row->live_amount = $result['data']['amount'];
                }
                return response()->json([
                    'code'=>200,
                    'status'=>'ok',
                    'data'=>$cards
                ]);
            }
        }
        //return  $cards;

    }


    public function sent(Request $request){
        $request->validate([
           'username'=>'required',
           'amount'=>'required'
        ]);

        $amount = $request->amount;

        $sendUser = User::where('username','=',$request->username)->first();
        $sendemail = User::where('email','=',$request->username)->first();



//        return response()->json($sendemail->id);
        $user = auth()->user();
        if ($sendUser){
            $senduserid = $sendUser->id;
            if ($user->balance >50) {
                $sendUser->balance += $amount;
                $sendUser->save();
                $user->balance -=$amount;
                $user->save();

                $wallet = Wallet::where('user_id', '=', $sendUser->id)->first();
                if ($wallet) {
                    $wallet->amount += $amount;
                    $wallet->save();
                } else {
                    $w = new Wallet();
                    $w->user_id = $senduserid;
                    $w->wallet_id = 1;
                    $w->amount = $amount;
                    $w->status = 1;
                    $w->save();
                }
                $transaction = new Transaction();
                $transaction->user_id = $senduserid;
                $transaction->sender_id = auth()->user()->id;
                $transaction->amount = $amount;
                $transaction->post_balance = $user->balance;
                $transaction->charge = 0;
                $transaction->trx_type = null;
                $transaction->details = 'Added Balance Via User';
                $transaction->trx =  $senduserid;
                $transaction->save();
                return  response()->json([
                    'status'=>200,
                    'message'=>'send money successful'
                    ]);
            }else{
                return response()->json([
                    'message'=>'You Do not Have sufficient balance'
                ]);
            }


        }elseif($sendemail){
            $sendemailid = $sendemail->id;
            if ($user->balance >50) {
                $sendemail->balance += $amount;
                $sendemail->save();
                $user->balance -=$amount;
                $user->save();
                $wallet = Wallet::where('user_id', '=', $sendemail->id)->first();
                if ($wallet) {
                    $wallet->amount += $amount;
                    $wallet->save();
                } else {
                    $w = new Wallet();
                    $w->user_id = $sendemailid;
                    $w->wallet_id = 1;
                    $w->amount = $amount;
                    $w->status = 1;
                    $w->save();
                }
                $transaction = new Transaction();
                $transaction->user_id = $sendemailid;
                $transaction->sender_id = auth()->user()->id;
                $transaction->amount = $amount;
                $transaction->post_balance = $user->balance;
                $transaction->charge = 0;
                $transaction->trx_type = null;
                $transaction->details = 'Added Balance Via User';
                $transaction->trx =  $sendemailid;
                $transaction->save();
                return  response()->json([
                    'status'=>200,
                    'message'=>'send money successful'
                ]);
            }else{
                return response()->json([
                    'message'=>'You Do not Have sufficient balance'
                ]);
            }
        }else{
            return  response()->json('user not found');

        }


    }

    public function transaction(){
        $user = auth()->user();
        $trx = Transaction::where('user_id','=',$user->id)->get();
        $trx2 = Transaction::where('sender_id','=',$user->id)->get();
        return response()->json([
            'status'=>200,
            'get_money'=>$trx,
            'send_money'=>$trx2
        ]);
    }
}
