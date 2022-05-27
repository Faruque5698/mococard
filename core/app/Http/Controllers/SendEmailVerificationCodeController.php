<?php

namespace App\Http\Controllers;

use App\Mail\EmailVerificationMail;
use App\Mail\SendCodeResetPassword;
use App\Models\EmailVerificationCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmailVerificationCodeController extends Controller
{
    public function email(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        // Delete all old code that user send before.
        EmailVerificationCode::where('email', $request->email)->delete();

        // Generate random code
        $data['code'] = mt_rand(100000, 999999);

        // Create a new code
        $codeData = EmailVerificationCode::create($data);

        // Send email to user
        Mail::to($request->email)->send(new EmailVerificationMail($codeData->code));

        return response(['message' => trans('passwords.sent')], 200);
    }

    public function email_back(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        // Delete all old code that user send before.
        EmailVerificationCode::where('email', $request->email)->delete();

        // Generate random code
        $data['code'] = mt_rand(100000, 999999);

        // Create a new code
        $codeData = EmailVerificationCode::create($data);

        // Send email to user
        Mail::to($request->email)->send(new EmailVerificationMail($codeData->code));

        return redirect('emailverificationcode');
    }
}
