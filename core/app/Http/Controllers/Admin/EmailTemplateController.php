<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GeneralSettings;
use App\Models\Models\CardApi;
use Illuminate\Http\Request;
use App\Models\EmailTemplate;
use App\Models\GeneralSetting;
//use function App\Http\Controllers\update_env;

class EmailTemplateController extends Controller
{
    public function index()
    {
        $pageTitle = 'Email Templates';
        $emptyMessage = 'No templates available';
        $email_templates = EmailTemplate::get();
        return view('admin.email_template.index', compact('pageTitle', 'emptyMessage', 'email_templates'));
    }

    public function edit($id)
    {
        $email_template = EmailTemplate::findOrFail($id);
        $pageTitle = $email_template->name;
        $emptyMessage = 'No shortcode available';
        return view('admin.email_template.edit', compact('pageTitle', 'email_template','emptyMessage'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'subject' => 'required',
            'email_body' => 'required',
        ]);
        $email_template = EmailTemplate::findOrFail($id);
        $email_template->subj = $request->subject;
        $email_template->email_body = $request->email_body;
        $email_template->email_status = $request->email_status ? 1 : 0;
        $email_template->save();

        $notify[] = ['success', $email_template->name . ' template has been updated.'];
        return back()->withNotify($notify);
    }


    public function emailSetting()
    {
        $pageTitle = 'Email Configuration';
        return view('admin.email_template.email_setting', compact('pageTitle'));
    }

    public function emailSettingUpdate(Request $request)
    {
        $request->validate([
            'email_method' => 'required|in:php,smtp,sendgrid,mailjet',
            'host' => 'required_if:email_method,smtp',
            'port' => 'required_if:email_method,smtp',
            'username' => 'required_if:email_method,smtp',
            'password' => 'required_if:email_method,smtp',
            'enc' => 'required_if:email_method,smtp',
            'appkey' => 'required_if:email_method,sendgrid',
            'public_key' => 'required_if:email_method,mailjet',
            'secret_key' => 'required_if:email_method,mailjet',
        ], [
            'host.required_if' => ':attribute is required for SMTP configuration',
            'port.required_if' => ':attribute is required for SMTP configuration',
            'username.required_if' => ':attribute is required for SMTP configuration',
            'password.required_if' => ':attribute is required for SMTP configuration',
            'enc.required_if' => ':attribute is required for SMTP configuration',
            'appkey.required_if' => ':attribute is required for SendGrid configuration',
            'public_key.required_if' => ':attribute is required for Mailjet configuration',
            'secret_key.required_if' => ':attribute is required for Mailjet configuration',
        ]);
        if ($request->email_method == 'php') {
            $data['name'] = 'php';
        } else if ($request->email_method == 'smtp') {
            $request->merge(['name' => 'smtp']);
            $data = $request->only('name', 'host', 'port', 'enc', 'username', 'password', 'driver');
        } else if ($request->email_method == 'sendgrid') {
            $request->merge(['name' => 'sendgrid']);
            $data = $request->only('name', 'appkey');
        } else if ($request->email_method == 'mailjet') {
            $request->merge(['name' => 'mailjet']);
            $data = $request->only('name', 'public_key', 'secret_key');
        }
        $general = GeneralSetting::first();
        $general->mail_config = $data;
        $general->save();

        if (!function_exists('update_env')) {
            function update_env( $data = [] ) : void
            {

                $path = base_path('.env');

                if (file_exists($path)) {
                    foreach ($data as $key => $value) {
                        file_put_contents($path, str_replace(
                            $key . '=' . env($key), $key . '=' . $value, file_get_contents($path)
                        ));
                    }
                }

            }
        }
        $general = GeneralSetting::find(1);

        $mail_mailer = $request->email_method;
        $mail_host = $request->host;
        $mail_port = $request->port;
        $mail_password = $request->password;
        $mail_encryption = $request->enc;
        $mail_username = $request->username;



        $data = [
            'APP_NAME'=>$general->sitename,
            'MAIL_MAILER'=>$mail_mailer,
            'MAIL_HOST'=>$mail_host,
            'MAIL_PORT'=>$mail_port,
            'MAIL_USERNAME'=>$mail_username,
            'MAIL_PASSWORD'=>$mail_password,
            'MAIL_ENCRYPTION'=>$mail_encryption,
            'MAIL_FROM_ADDRESS'=>$mail_username,

        ];
        update_env($data);

        $notify[] = ['success', 'Email configuration has been updated.'];
        return back()->withNotify($notify);
    }


    public function emailTemplate()
    {
        $pageTitle = 'Global Email Template';
        return view('admin.email_template.email_template', compact('pageTitle'));
    }

    public function emailTemplateUpdate(Request $request)
    {
        $request->validate([
            'email_from' => 'required|email',
        ]);

        $general = GeneralSetting::first();
        $general->email_from = $request->email_from;
        $general->email_template = $request->email_template;
        $general->save();

        $notify[] = ['success', 'Global email template has been updated.'];
        return back()->withNotify($notify);
    }

    public function sendTestMail(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $general = GeneralSetting::first();
        $config = $general->mail_config;
        $receiver_name = explode('@', $request->email)[0];
        $subject = 'Testing ' . strtoupper($config->name) . ' Mail';
        $message = 'This is a test email, please ignore it if you are not meant to get this email.';

        try {
            sendGeneralEmail($request->email, $subject, $message, $receiver_name);
        } catch (\Exception $exp) {
            $notify[] = ['error', 'Invalid credential'];
            return back()->withNotify($notify);
        }

        $notify[] = ['success', 'You should receive a test mail at ' . $request->email . ' shortly.'];
        return back()->withNotify($notify);
    }



    public function CardApiSetting()
    {

        $pageTitle = 'Card API Configuration';
        $api = CardApi::find(1);
        return view('admin.card_api.card_api_setting', compact('pageTitle', 'api'));
    }



    public function CardApiSettingUpdate(Request $request)
    {
        $api = CardApi::find(1);
        $api->secret_key = $request->secret_key;
        $api->secret_hash = $request->secret_hash;
        $api->save();

        file_put_contents(app()->environmentFilePath(), str_replace(
            "SECRET_KEY" . '=' . env("SECRET_KEY"),
            "SECRET_KEY" . '=' . $api->secret_key,
            file_get_contents(app()->environmentFilePath())
        ));

        file_put_contents(app()->environmentFilePath(), str_replace(
            "SECRET_HASH" . '=' . env("SECRET_HASH"),
            "SECRET_HASH" . '=' . $api->secret_hash,
            file_get_contents(app()->environmentFilePath())
        ));

        $notify[] = ['success', 'Card API has been updated.'];
        return back()->withNotify($notify);
    }



}
