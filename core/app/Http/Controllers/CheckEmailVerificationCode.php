<?php

namespace App\Http\Controllers;

use App\Models\EmailVerificationCode;
use Illuminate\Http\Request;

class CheckEmailVerificationCode extends Controller
{
    public function check(Request $request)
    {
        $request->validate([
            'code' => 'required|string|exists:email_verification_codes',
        ]);

        // find the code
        $emailverificationcode = EmailVerificationCode::firstWhere('code', $request->code);

        // check if it does not expired: the time is one hour
        if ($emailverificationcode->created_at < now()->addHour()) {
            $emailverificationcode->delete();
            return response(['message' => trans('passwords.code_is_expire')], 422);
        }

        return response([
            'code' => $emailverificationcode->code,
            'message' => trans('email verification.code_is_valid')
        ], 200);
    }
}
