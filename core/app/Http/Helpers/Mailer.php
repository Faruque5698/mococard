<?php


namespace App\Http\Helpers;


use Illuminate\Support\Facades\Mail;

class Mailer
{
    public static function SendMail($view, $mailData)
    {
        try {
            Mail::send($view, ['data' => $mailData], function ($message) use ($mailData) {
                $message->to($mailData['email']);
                $message->subject($mailData['subject']);
                if (array_key_exists("attachment",$mailData)) {
                    $message->attach($mailData['attachment']);
                }
            });
        }
        catch (\Exception $ex) {
            return 'Error to send mail. Details: '.$ex->getMessage();
        }
    }
}
