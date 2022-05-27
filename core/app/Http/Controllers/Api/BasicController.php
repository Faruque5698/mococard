<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use App\Models\Language;
use Illuminate\Http\Request;

class BasicController extends Controller
{
    public function generalSetting(){
        
    	$less = [
            'cur_text',
            'cur_sym',
            'email_from',
            'email_template',
            'mail_config',
            'sms_config',
            'sms_api',
            'force_ssl',
            'secure_password',
            'agree'
        ];
    	$general = GeneralSetting::first()->makeHidden($less);
		$notify[] = 'General setting data';
		return response()->json([
			'code'=>200,
			'status'=>'ok',
	        'message'=>['success'=>$notify],
	        'data'=>['general_setting'=>$general]
	    ]);
    }

    public function unauthenticate(){
    	$notify[] = 'Unauthenticated user';
		return response()->json([
			'code'=>403,
			'status'=>'unauthorized',
	        'message'=>['error'=>$notify]
	    ]);
    }

    public function languages(){
    	$languages = Language::get();
    	return response()->json([
			'code'=>200,
			'status'=>'ok',
	        'data'=>[
	        	'languages'=>$languages,
	        	'image_path'=>imagePath()['language']['path']
	        ]
	    ]);
    }

    public function languageData($code){
    	$language = Language::where('code',$code)->first();
    	if (!$language) {
    		$notify[] = 'Language not found';
    		return response()->json([
				'code'=>404,
				'status'=>'error',
		        'message'=>['error'=>$notify]
		    ]);
    	}
    	$jsonFile = strtolower($language->code) . '.json';
    	$fileData = resource_path('lang/').$jsonFile;
    	$languageData = json_decode(file_get_contents($fileData));
		return response()->json([
			'code'=>200,
			'status'=>'ok',
	        'message'=>[
	        	'language_data'=>$languageData
	        ]
	    ]);
    }
}
