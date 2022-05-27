<?php

namespace App\Http\Controllers;

use App\Models\EmailVerificationCode;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
//use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class EmailVerificationController extends Controller
{
    public function index(){
        return view('auth.verify');
    }

    public function emailverificationcode(){
        return view('auth.email_code');
    }

    public function reset(Request $request)
    {
        $request->validate([
            'code' => 'required|string|exists:email_verification_codes',
//            'password' => 'required|string|min:6|confirmed',
        ]);

        // find the code
        $passwordReset = EmailVerificationCode::firstWhere('code', $request->code);

        // check if it does not expired: the time is one hour
        if ($passwordReset->created_at < now()->addHour()) {
            $passwordReset->delete();
            return response(['message' => trans('email verification.code_is_expire')], 422);
        }

        // find user's email
        $user = User::firstWhere('email', $passwordReset->email);
////        $mytime = Carbon::now();
//        // update user password
        $user->update([
            'ev' => 1,
        ]);
//        return response($user);

//        // delete current code
        $passwordReset->delete();
//
        return response(['message' =>'email verified successfully'], 200);
    }
    public function reset_back(Request $request)
    {
        $request->validate([
            'code' => 'required|string|exists:email_verification_codes',
//            'password' => 'required|string|min:6|confirmed',
        ]);

        // find the code
        $passwordReset = EmailVerificationCode::firstWhere('code', $request->code);

        // check if it does not expired: the time is one hour
//        if ($passwordReset->created_at < now()->addHour()) {
//            $passwordReset->delete();
//            return response(['message' => trans('email verification.code_is_expire')], 422);
//        }

        // find user's email
        $user = User::firstWhere('email', $passwordReset->email);
////        $mytime = Carbon::now();
//        // update user password
//        $user->update([
//            'ev' => 1,
//        ]);
        $user->ev =1;
        $user->save();
//        // delete current code
        $passwordReset->delete();

        return redirect()->route('host_meeting');
    }
}
