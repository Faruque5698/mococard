<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\AuthorizationController;
use App\Http\Controllers\UserWithdrawMoneyController;
use App\Http\Controllers\SendMoneyController;



Route::post('login',[LoginController::class,'login'])->name('api.login');
Route::post('register',[RegisterController::class,'register']);
Route::post('verification/email',  [\App\Http\Controllers\SendEmailVerificationCodeController::class,'email']);
Route::post('verification/code/check', [\App\Http\Controllers\CheckEmailVerificationCode::class,'check']);
Route::post('email/verification', [\App\Http\Controllers\EmailVerificationController::class,'reset']);

Route::namespace('Api')->name('api.')->group(function(){
	Route::get('general-setting','BasicController@generalSetting');
	Route::get('unauthenticate','BasicController@unauthenticate')->name('unauthenticate');
	Route::get('languages','BasicController@languages');
	Route::get('language-data/{code}','BasicController@languageData');

	Route::namespace('Auth')->group(function(){
//		Route::post('login', 'LoginController@login');
//		Route::post('register', 'RegisterController@register');

	    Route::post('password/email', 'ForgotPasswordController@sendResetCodeEmail');
	    Route::post('password/verify-code', 'ForgotPasswordController@verifyCode');

	    Route::post('password/reset', 'ResetPasswordController@reset');
	});


//    Route::group(["middleware" => ["auth:api"]], function(){
//
//
//    });

    Route::group(["middleware" => ["auth:api","email_verification_api"]], function(){

        Route::post('logout',[LoginController::class,'logout']);
        Route::post('profile',[LoginController::class,'profile']);

		Route::get('authorization', [AuthorizationController::class,'authorization'])->name('authorization');
	    Route::get('resend-verify', 'AuthorizationController@sendVerifyCode')->name('send.verify.code');
	    Route::post('verify-email', 'AuthorizationController@emailVerification')->name('verify.email');
	    Route::post('verify-sms', 'AuthorizationController@smsVerification')->name('verify.sms');
	    Route::post('verify-g2fa', 'AuthorizationController@g2faVerification')->name('go2fa.verify');

	    Route::middleware(['checkStatusApi'])->group(function(){
//	    Route::middleware(['auth:api'])->group(function(){
//	    	Route::get('dashboard',function(){
//	    		return auth()->user();
//	    	});
            Route::get('dashboard',[\App\Http\Controllers\UserController::class,'dashboard']);

            Route::post('profile-setting', 'UserController@submitProfile');
            Route::post('change-password', 'UserController@submitPassword');

            // Withdrawp
            Route::get('withdraw/methods', 'UserController@withdrawMethods');
            Route::post('withdraw/store', 'UserController@withdrawStore');
            Route::post('withdraw/confirm', 'UserController@withdrawConfirm');
            Route::get('withdraw/history', 'UserController@withdrawLog');

            /*
                        * User Withdraw Ticket
                        */
            Route::get('/withdraw-money', [UserWithdrawMoneyController::class,'withdrawMoney']);
            Route::post('/withdraw-money', [UserWithdrawMoneyController::class,'withdrawMoneyRequest']);
//            Route::post('/withdraw-money', 'UserWithdrawMoneyController@withdrawMoneyRequest');
            Route::get('/withdraw-preview/{trx}', [UserWithdrawMoneyController::class,'withdrawReqPreview']);
            Route::post('/withdraw-submit', [UserWithdrawMoneyController::class,'withdrawReqSubmit']);
            Route::get('/withdraw-log', [UserWithdrawMoneyController::class,'withdrawLog']);
//            Route::post('/withdraw-preview', 'UserWithdrawMoneyController@withdrawReqSubmit')->name('withdraw.submit');
//            Route::get('/withdraw-log', 'UserWithdrawMoneyController@withdrawLog');
            Route::post('/withdraw-bonus-money', [UserWithdrawMoneyController::class,'withdrawBonusMoneyRequest']);
            Route::post('/withdraw-bonus-submit', [UserWithdrawMoneyController::class,'withdrawBonusReqSubmit']);


            /*
             *
             */


            // Deposit
            Route::get('deposit/methods', 'PaymentController@depositMethods');
            Route::post('deposit/insert', 'PaymentController@depositInsert');
            Route::post('deposit/confirm', 'PaymentController@depositConfirm');

            Route::get('deposit/manual', 'PaymentController@manualDepositConfirm');
            Route::post('deposit/manual', 'PaymentController@manualDepositUpdate');

            Route::get('deposit/history', 'UserController@depositHistory');

            Route::get('transactions', 'UserController@transactions');

//            Send money
            Route::post('sendmoney',[SendMoneyController::class,'sent']);

//            Transaction
            Route::get('transfer',[SendMoneyController::class,'transaction']);


//            Card Buy

            Route::get('card-package',[\App\Http\Controllers\CardController::class,'card_package']);
            Route::post('card/select',[\App\Http\Controllers\CardController::class,'cardSelect']);
            Route::get('cards_list',[SendMoneyController::class,'cards']);


            Route::post('card_transaction',[\App\Http\Controllers\Admin\VirtualCardController::class,'card_transaction']);
            Route::get('card_details/{card_id}',[\App\Http\Controllers\Admin\VirtualCardController::class,'card_details']);

//            Route::post('add_money_to_main_balance_from_card',[UserWithdrawMoneyController::class,'add_money_to_main_balance_from_card']);

//            Withdraw money From Card

            Route::post('card-withdraw',[\App\Http\Controllers\CardMoneyWithdrawController::class,'card_withdraw']);
            Route::post('card-withdraw-submit',[\App\Http\Controllers\CardMoneyWithdrawController::class,'card_withdraw_submit']);

            Route::post('add_money_to_card_from_main_balance',[UserWithdrawMoneyController::class,'add_money_to_main_balance_from_card']);

//            currency
            Route::get('currency',[\App\Http\Controllers\CardMoneyWithdrawController::class,'currency']);
            Route::get('currency/details/{id}',[\App\Http\Controllers\CardMoneyWithdrawController::class,'currency_details']);


//            Route::get('transfer_money');



	    });



	});
});
