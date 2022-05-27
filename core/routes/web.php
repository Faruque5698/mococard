<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\Admin\WithdrawMethodController;
use App\Http\Controllers\Admin\WithdrawalController;
use Illuminate\Support\Facades\Artisan;

Route::get('/clear', function(){
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
});
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/api-login',function(){
    return response()->json([
        'code' => 401,
        'status' => 'unathorized',
    ], 401);
})->name('login');

//Route::get('hello',function (){
//   return url('/');
//});

Route::get('refer/{user_id}/{username}',[ReferralController::class,'refer'])->name('refer');

Route::namespace('Gateway')->prefix('ipn')->name('ipn.')->group(function () {
    Route::post('paypal', 'Paypal\ProcessController@ipn')->name('Paypal');
    Route::get('paypal-sdk', 'PaypalSdk\ProcessController@ipn')->name('PaypalSdk');
    Route::post('perfect-money', 'PerfectMoney\ProcessController@ipn')->name('PerfectMoney');
    Route::post('stripe', 'Stripe\ProcessController@ipn')->name('Stripe');
    Route::post('stripe-js', 'StripeJs\ProcessController@ipn')->name('StripeJs');
    Route::post('stripe-v3', 'StripeV3\ProcessController@ipn')->name('StripeV3');
    Route::post('skrill', 'Skrill\ProcessController@ipn')->name('Skrill');
    Route::post('paytm', 'Paytm\ProcessController@ipn')->name('Paytm');
    Route::post('payeer', 'Payeer\ProcessController@ipn')->name('Payeer');
    Route::post('paystack', 'Paystack\ProcessController@ipn')->name('Paystack');
    Route::post('voguepay', 'Voguepay\ProcessController@ipn')->name('Voguepay');
    Route::get('flutterwave/{trx}/{type}', 'Flutterwave\ProcessController@ipn')->name('Flutterwave');
    Route::post('razorpay', 'Razorpay\ProcessController@ipn')->name('Razorpay');
    Route::post('instamojo', 'Instamojo\ProcessController@ipn')->name('Instamojo');
    Route::get('blockchain', 'Blockchain\ProcessController@ipn')->name('Blockchain');
    Route::get('blockio', 'Blockio\ProcessController@ipn')->name('Blockio');
    Route::post('coinpayments', 'Coinpayments\ProcessController@ipn')->name('Coinpayments');
    Route::post('coinpayments-fiat', 'Coinpayments_fiat\ProcessController@ipn')->name('CoinpaymentsFiat');
    Route::post('coingate', 'Coingate\ProcessController@ipn')->name('Coingate');
    Route::post('coinbase-commerce', 'CoinbaseCommerce\ProcessController@ipn')->name('CoinbaseCommerce');
    Route::get('mollie', 'Mollie\ProcessController@ipn')->name('Mollie');
    Route::post('cashmaal', 'Cashmaal\ProcessController@ipn')->name('Cashmaal');
    Route::post('authorize-net', 'AuthorizeNet\ProcessController@ipn')->name('AuthorizeNet');
    Route::post('2check-out', 'TwoCheckOut\ProcessController@ipn')->name('TwoCheckOut');
    Route::post('mercado-pago', 'MercadoPago\ProcessController@ipn')->name('MercadoPago');
});

// User Support Ticket
Route::prefix('ticket')->group(function () {
    Route::get('/', 'TicketController@supportTicket')->name('ticket');
    Route::get('/new', 'TicketController@openSupportTicket')->name('ticket.open');
    Route::post('/create', 'TicketController@storeSupportTicket')->name('ticket.store');
    Route::get('/view/{ticket}', 'TicketController@viewTicket')->name('ticket.view');
    Route::post('/reply/{ticket}', 'TicketController@replyTicket')->name('ticket.reply');
    Route::get('/download/{ticket}', 'TicketController@ticketDownload')->name('ticket.download');
});


/*
|--------------------------------------------------------------------------
| Start Admin Area
|--------------------------------------------------------------------------
*/

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::namespace('Auth')->group(function () {
        Route::get('/web-login', 'LoginController@showLoginForm')->name('admin.login');
        Route::post('/attempt-login', 'LoginController@login')->name('login-attempt');
        Route::get('logout', 'LoginController@logout')->name('logout');
        // Admin Password Reset
        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
        Route::post('password/reset', 'ForgotPasswordController@sendResetCodeEmail');
        Route::post('password/verify-code', 'ForgotPasswordController@verifyCode')->name('password.verify.code');
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset.form');
        Route::post('password/reset/change', 'ResetPasswordController@reset')->name('password.change');
    });

    Route::middleware('admin')->group(function () {

        Route::get('referral',[ReferralController::class,'index'])->name('referral');
        Route::post('referral',[ReferralController::class,'save'])->name('save.referral');


        Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
        Route::get('profile', 'AdminController@profile')->name('profile');
        Route::post('profile', 'AdminController@profileUpdate')->name('profile.update');
        Route::get('password', 'AdminController@password')->name('password');
        Route::post('password', 'AdminController@passwordUpdate')->name('password.update');

        //Notification
        Route::get('notifications','AdminController@notifications')->name('notifications');
        Route::get('notification/read/{id}','AdminController@notificationRead')->name('notification.read');
        Route::get('notifications/read-all','AdminController@readAll')->name('notifications.readAll');

        //Report Bugs
        Route::get('request-report','AdminController@requestReport')->name('request.report');
        Route::post('request-report','AdminController@reportSubmit');

        Route::get('system-info','AdminController@systemInfo')->name('system.info');


        // Users Manager
        Route::get('users', 'ManageUsersController@allUsers')->name('users.all');
        Route::get('users/active', 'ManageUsersController@activeUsers')->name('users.active');
        Route::get('users/banned', 'ManageUsersController@bannedUsers')->name('users.banned');
        Route::get('users/email-verified', 'ManageUsersController@emailVerifiedUsers')->name('users.email.verified');
        Route::get('users/email-unverified', 'ManageUsersController@emailUnverifiedUsers')->name('users.email.unverified');
        Route::get('users/sms-unverified', 'ManageUsersController@smsUnverifiedUsers')->name('users.sms.unverified');
        Route::get('users/sms-verified', 'ManageUsersController@smsVerifiedUsers')->name('users.sms.verified');
        Route::get('users/with -balance', 'ManageUsersController@usersWithBalance')->name('users.with.balance');

        Route::get('users/{scope}/search', 'ManageUsersController@search')->name('users.search');
        Route::get('user/detail/{id}', 'ManageUsersController@detail')->name('users.detail');
        Route::post('user/update/{id}', 'ManageUsersController@update')->name('users.update');
        Route::post('user/add-sub-balance/{id}', 'ManageUsersController@addSubBalance')->name('users.add.sub.balance');
        Route::get('user/send-email/{id}', 'ManageUsersController@showEmailSingleForm')->name('users.email.single');
        Route::post('user/send-email/{id}', 'ManageUsersController@sendEmailSingle')->name('users.email.single');
        Route::get('user/login/{id}', 'ManageUsersController@login')->name('users.login');
        Route::get('user/transactions/{id}', 'ManageUsersController@transactions')->name('users.transactions');
        Route::get('user/deposits/{id}', 'ManageUsersController@deposits')->name('users.deposits');
        Route::get('user/deposits/via/{method}/{type?}/{userId}', 'ManageUsersController@depositViaMethod')->name('users.deposits.method');

        // Login History
        Route::get('users/login/history/{id}', 'ManageUsersController@userLoginHistory')->name('users.login.history.single');

        Route::get('users/send-email', 'ManageUsersController@showEmailAllForm')->name('users.email.all');
        Route::post('users/send-email', 'ManageUsersController@sendEmailAll')->name('users.email.send');
        Route::get('users/email-log/{id}', 'ManageUsersController@emailLog')->name('users.email.log');
        Route::get('users/email-details/{id}', 'ManageUsersController@emailDetails')->name('users.email.details');

        Route::get('users/card/{id}', 'ManageUsersController@card')->name('users.card');

        Route::get('category', 'CategoryController@category')->name('category.index');
        Route::post('add/category', 'CategoryController@add')->name('add.category');
        Route::post('edit/category', 'CategoryController@edit')->name('edit.category');
        Route::post('featured/category', 'CategoryController@featured')->name('featured.category');

        Route::get('sub/category', 'SubCategoryController@subCategory')->name('sub.category.index');
        Route::post('add/sub/category', 'SubCategoryController@add')->name('add.sub.category');
        Route::post('edit/sub/category', 'SubCategoryController@edit')->name('edit.sub.category');

        Route::get('card', 'CardController@card')->name('card.index');
        Route::get('card/add/page', 'CardController@addPage')->name('card.add.page');
        Route::post('card/add', 'CardController@add')->name('card.add');
        Route::get('card/edit/{id}', 'CardController@editPage')->name('card.edit.page');
        Route::post('card/edit', 'CardController@edit')->name('card.edit');
        Route::post('card/delete', 'CardController@delete')->name('card.delete');


        //VIRTUAL CARDS===============================================================

        //Cards
        Route::get('virtual-card', 'VirtualCardController@card')->name('virtualCard');
        Route::get('filter-virtual-card', 'VirtualCardController@filterVirtualCard')->name('filterVirtualCard');
        Route::get('virtual-card-transaction-details/{id}', 'VirtualCardController@transactionDetails')->name('transactionDetails');
        Route::get('virtual-card-filter-transaction-details', 'VirtualCardController@filterTransactionDetails')->name('filterTransactionDetails');
        Route::post('virtual-card-terminate', 'VirtualCardController@cardTerminate')->name('cardTerminate');
        Route::post('virtual-card-block', 'VirtualCardController@cardBlock')->name('cardBlock');
        Route::get('all-virtual-card-transaction', 'VirtualCardController@allVirtualCardTransaction')->name('allVirtualCardTransaction');
        Route::get('filter-virtual-card-transaction', 'VirtualCardController@filterVirtualTransaction')->name('filterVirtualTransaction');


        // Plan Start
        Route::get('virtual-card/plan', 'PlanController@index')->name('virtualCard.plan');
        Route::get('virtual-card/plan-create', 'PlanController@create')->name('virtualCard.planCreate');
        Route::post('virtual-card/plan-store', 'PlanController@store')->name('virtualCard.planStore');
        Route::get('virtual-card/plan-edit/{id}', 'PlanController@edit')->name('virtualCard.planEdit');
        Route::post('virtual-card/plan-update/{id}', 'PlanController@update')->name('virtualCard.planUpdate');
        Route::post('virtual-card/plan-delete', 'PlanController@delete')->name('virtualCard.planDelete');
        Route::post('virtual-card/plan-type-change', 'PlanController@planTypeChange');


        Route::get('top/sold', 'AdminController@topSold')->name('top.sold');
        Route::get('today/sale', 'AdminController@todaySale')->name('today.sale');

        // Deposit Gateway
        Route::name('gateway.')->prefix('gateway')->group(function(){
            // Automatic Gateway
            Route::get('automatic', 'GatewayController@index')->name('automatic.index');
            Route::get('automatic/edit/{alias}', 'GatewayController@edit')->name('automatic.edit');
            Route::post('automatic/update/{code}', 'GatewayController@update')->name('automatic.update');
            Route::post('automatic/remove/{code}', 'GatewayController@remove')->name('automatic.remove');
            Route::post('automatic/activate', 'GatewayController@activate')->name('automatic.activate');
            Route::post('automatic/deactivate', 'GatewayController@deactivate')->name('automatic.deactivate');


            // Manual Methods
            Route::get('manual', 'ManualGatewayController@index')->name('manual.index');
            Route::get('manual/new', 'ManualGatewayController@create')->name('manual.create');
            Route::post('manual/new', 'ManualGatewayController@store')->name('manual.store');
            Route::get('manual/edit/{alias}', 'ManualGatewayController@edit')->name('manual.edit');
            Route::post('manual/update/{id}', 'ManualGatewayController@update')->name('manual.update');
            Route::post('manual/activate', 'ManualGatewayController@activate')->name('manual.activate');
            Route::post('manual/deactivate', 'ManualGatewayController@deactivate')->name('manual.deactivate');

//            Withdraw Method



        });

//        Front end
        Route::name('frontend.')->prefix('frontend')->group(function (){
            Route::get('banner',[\App\Http\Controllers\Admin\FrontendController::class,'banner'])->name('banner');
            Route::post('save_banner',[\App\Http\Controllers\Admin\FrontendController::class,'save_banner'])->name('save_banner');
            Route::get('brand',[\App\Http\Controllers\Admin\FrontendController::class,'brand'])->name('brand');
            Route::post('brand_save',[\App\Http\Controllers\Admin\FrontendController::class,'brand_save'])->name('brand_save');
            Route::post('brand_update',[\App\Http\Controllers\Admin\FrontendController::class,'brand_update'])->name('brand_update');
            Route::get('brand_delete/{id}',[\App\Http\Controllers\Admin\FrontendController::class,'brand_delete'])->name('brand_delete');
            Route::get('about',[\App\Http\Controllers\Admin\FrontendController::class,'about'])->name('about');
            Route::post('save_about',[\App\Http\Controllers\Admin\FrontendController::class,'save_about'])->name('save_about');

        });

        Route::get('add_card_to_main_account_charge',[\App\Http\Controllers\Admin\FrontendController::class,'add_card_to_main_account_charge'])->name('add_card_to_main_account_charge');
        Route::post('charge_save',[\App\Http\Controllers\Admin\FrontendController::class,'charge_save'])->name('charge_save');


        // WITHDRAW SYSTEM
        Route::get('withdraw/log', 'WithdrawalController@log')->name('withdraw.log');
        Route::get('withdraw/{scope}/search', 'WithdrawalController@search')->name('withdraw.search');
        Route::get('withdraw/pending', 'WithdrawalController@pending')->name('withdraw.pending');
        Route::get('withdraw/approved', 'WithdrawalController@approved')->name('withdraw.approved');
        Route::get('withdraw/rejected', 'WithdrawalController@rejected')->name('withdraw.rejected');
        Route::post('withdraw/approve', 'WithdrawalController@approve')->name('withdraw.approve');
        Route::post('withdraw/reject', 'WithdrawalController@reject')->name('withdraw.reject');

        // Withdraw Method
//        Route::get('withdraw/method/', 'WithdrawMethodController@methods')->name('withdraw.method.methods');
//        Route::get('withdraw/method/new', 'WithdrawMethodController@create')->name('withdraw.method.create');
//        Route::post('withdraw/method/store', 'WithdrawMethodController@store')->name('withdraw.method.store');
//        Route::get('withdraw/method/edit/{id}', 'WithdrawMethodController@edit')->name('withdraw.method.edit');
//        Route::post('withdraw/method/edit/{id}', 'WithdrawMethodController@update')->name('withdraw.method.update');
        Route::post('withdraw/method/activate', [WithdrawMethodController::class,'activate'])->name('withdraw.method.activate');
        Route::post('withdraw/method/deactivate', [WithdrawMethodController::class,'deactivate'])->name('withdraw.method.deactivate');

        Route::get('withdraw/method/', [WithdrawMethodController::class,'methods'])->name('withdraw.method.methods');
        Route::get('withdraw/method/new', [WithdrawMethodController::class,'create'])->name('withdraw.method.create');
        Route::post('withdraw/method/store', [WithdrawMethodController::class,'store'])->name('withdraw.method.store');
        Route::get('withdraw/method/edit/{id}', [WithdrawMethodController::class,'edit'])->name('withdraw.method.edit');
        Route::post('withdraw/method/edit/{id}', [WithdrawMethodController::class,'update'])->name('withdraw.method.update');

        // DEPOSIT SYSTEM
        Route::name('deposit.')->prefix('deposit')->group(function(){
            Route::get('/', 'DepositController@deposit')->name('list');
            Route::get('pending', 'DepositController@pending')->name('pending');
            Route::get('rejected', 'DepositController@rejected')->name('rejected');
            Route::get('approved', 'DepositController@approved')->name('approved');
            Route::get('successful', 'DepositController@successful')->name('successful');
            Route::get('details/{id}', 'DepositController@details')->name('details');

            Route::post('reject', 'DepositController@reject')->name('reject');
            Route::post('approve', 'DepositController@approve')->name('approve');
            Route::get('via/{method}/{type?}', 'DepositController@depositViaMethod')->name('method');
            Route::get('/{scope}/search', 'DepositController@search')->name('search');
            Route::get('date-search/{scope}', 'DepositController@dateSearch')->name('dateSearch');

        });

        // Report
        Route::get('report/transaction', 'ReportController@transaction')->name('report.transaction');
        Route::get('report/transaction/search', 'ReportController@transactionSearch')->name('report.transaction.search');
        Route::get('report/login/history', 'ReportController@loginHistory')->name('report.login.history');
        Route::get('report/login/ipHistory/{ip}', 'ReportController@loginIpHistory')->name('report.login.ipHistory');
        Route::get('report/email/history', 'ReportController@emailHistory')->name('report.email.history');


        // Admin Support
        Route::get('tickets', 'SupportTicketController@tickets')->name('ticket');
        Route::get('tickets/pending', 'SupportTicketController@pendingTicket')->name('ticket.pending');
        Route::get('tickets/closed', 'SupportTicketController@closedTicket')->name('ticket.closed');
        Route::get('tickets/answered', 'SupportTicketController@answeredTicket')->name('ticket.answered');
        Route::get('tickets/view/{id}', 'SupportTicketController@ticketReply')->name('ticket.view');
        Route::post('ticket/reply/{id}', 'SupportTicketController@ticketReplySend')->name('ticket.reply');
        Route::get('ticket/download/{ticket}', 'SupportTicketController@ticketDownload')->name('ticket.download');
        Route::post('ticket/delete', 'SupportTicketController@ticketDelete')->name('ticket.delete');


        // Language Manager
        Route::get('/language', 'LanguageController@langManage')->name('language.manage');
        Route::post('/language', 'LanguageController@langStore')->name('language.manage.store');
        Route::post('/language/delete/{id}', 'LanguageController@langDel')->name('language.manage.del');
        Route::post('/language/update/{id}', 'LanguageController@langUpdate')->name('language.manage.update');
        Route::get('/language/edit/{id}', 'LanguageController@langEdit')->name('language.key');
        Route::post('/language/import', 'LanguageController@langImport')->name('language.importLang');



        Route::post('language/store/key/{id}', 'LanguageController@storeLanguageJson')->name('language.store.key');
        Route::post('language/delete/key/{id}', 'LanguageController@deleteLanguageJson')->name('language.delete.key');
        Route::post('language/update/key/{id}', 'LanguageController@updateLanguageJson')->name('language.update.key');



        // General Setting
        Route::get('app_settings',[\App\Http\Controllers\Admin\GeneralSettingController::class,'app'])->name('setting.app');
        Route::post('app_settings',[\App\Http\Controllers\Admin\GeneralSettingController::class,'app_update'])->name('app_update');
        Route::get('general-setting', 'GeneralSettingController@index')->name('setting.index');
        Route::post('general-setting', 'GeneralSettingController@update')->name('setting.update');
        Route::get('optimize', 'GeneralSettingController@optimize')->name('setting.optimize');

        // Logo-Icon
        Route::get('setting/logo-icon', 'GeneralSettingController@logoIcon')->name('setting.logo.icon');
        Route::post('setting/logo-icon', 'GeneralSettingController@logoIconUpdate')->name('setting.logo.icon');

        //Custom CSS
        Route::get('custom-css','GeneralSettingController@customCss')->name('setting.custom.css');
        Route::post('custom-css','GeneralSettingController@customCssSubmit');


        //Cookie
        Route::get('cookie','GeneralSettingController@cookie')->name('setting.cookie');
        Route::post('cookie','GeneralSettingController@cookieSubmit');


        // Plugin
        Route::get('extensions', 'ExtensionController@index')->name('extensions.index');
        Route::post('extensions/update/{id}', 'ExtensionController@update')->name('extensions.update');
        Route::post('extensions/activate', 'ExtensionController@activate')->name('extensions.activate');
        Route::post('extensions/deactivate', 'ExtensionController@deactivate')->name('extensions.deactivate');



        // Email Setting
        Route::get('email-template/global', 'EmailTemplateController@emailTemplate')->name('email.template.global');
        Route::post('email-template/global', 'EmailTemplateController@emailTemplateUpdate')->name('email.template.global');
        Route::get('email-template/setting', 'EmailTemplateController@emailSetting')->name('email.template.setting');
        Route::post('email-template/setting', 'EmailTemplateController@emailSettingUpdate')->name('email.template.setting');
        Route::get('email-template/index', 'EmailTemplateController@index')->name('email.template.index');
        Route::get('email-template/{id}/edit', 'EmailTemplateController@edit')->name('email.template.edit');
        Route::post('email-template/{id}/update', 'EmailTemplateController@update')->name('email.template.update');
        Route::post('email-template/send-test-mail', 'EmailTemplateController@sendTestMail')->name('email.template.test.mail');



        Route::get('card-api-template/setting', 'EmailTemplateController@CardApiSetting')->name('cardApi.template.setting');
        Route::post('card-api-template/setting', 'EmailTemplateController@CardApiSettingUpdate')->name('cardApi.template.setting');


        // SMS Setting
        Route::get('sms-template/global', 'SmsTemplateController@smsTemplate')->name('sms.template.global');
        Route::post('sms-template/global', 'SmsTemplateController@smsTemplateUpdate')->name('sms.template.global');
        Route::get('sms-template/setting','SmsTemplateController@smsSetting')->name('sms.templates.setting');
        Route::post('sms-template/setting', 'SmsTemplateController@smsSettingUpdate')->name('sms.template.setting');
        Route::get('sms-template/index', 'SmsTemplateController@index')->name('sms.template.index');
        Route::get('sms-template/edit/{id}', 'SmsTemplateController@edit')->name('sms.template.edit');
        Route::post('sms-template/update/{id}', 'SmsTemplateController@update')->name('sms.template.update');
        Route::post('email-template/send-test-sms', 'SmsTemplateController@sendTestSMS')->name('sms.template.test.sms');

        // SEO
        Route::get('seo', 'FrontendController@seoEdit')->name('seo');


        // Frontend
        Route::name('frontend.')->prefix('frontend')->group(function () {


            Route::get('templates', 'FrontendController@templates')->name('templates');
            Route::post('templates', 'FrontendController@templatesActive')->name('templates.active');


            Route::get('frontend-sections/{key}', 'FrontendController@frontendSections')->name('sections');
            Route::post('frontend-content/{key}', 'FrontendController@frontendContent')->name('sections.content');
            Route::get('frontend-element/{key}/{id?}', 'FrontendController@frontendElement')->name('sections.element');
            Route::post('remove', 'FrontendController@remove')->name('remove');

            // Page Builder
            Route::get('manage-pages', 'PageBuilderController@managePages')->name('manage.pages');
            Route::post('manage-pages', 'PageBuilderController@managePagesSave')->name('manage.pages.save');
            Route::post('manage-pages/update', 'PageBuilderController@managePagesUpdate')->name('manage.pages.update');
            Route::post('manage-pages/delete', 'PageBuilderController@managePagesDelete')->name('manage.pages.delete');
            Route::get('manage-section/{id}', 'PageBuilderController@manageSection')->name('manage.section');
            Route::post('manage-section/{id}', 'PageBuilderController@manageSectionUpdate')->name('manage.section.update');
        });
    });
});




/*
|--------------------------------------------------------------------------
| Start User Area
|--------------------------------------------------------------------------
*/
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return "Clear Cache";
});

Route::name('user.')->group(function () {
//    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
//    Route::post('/login', 'Auth\LoginController@login');
//    Route::get('logout', 'Auth\LoginController@logout')->name('logout');
//
//    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//    Route::post('register', 'Auth\RegisterController@register')->middleware('regStatus');
//    Route::post('check-mail', 'Auth\RegisterController@checkUser')->name('checkUser');

//    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetCodeEmail')->name('password.email');
//    Route::get('password/code-verify', 'Auth\ForgotPasswordController@codeVerify')->name('password.code.verify');
//    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
//    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//    Route::post('password/verify-code', 'Auth\ForgotPasswordController@verifyCode')->name('password.verify.code');
});

Route::name('user.')->prefix('user')->group(function () {
    Route::middleware('auth_api')->group(function () {
//        Route::get('authorization', 'AuthorizationController@authorizeForm')->name('authorization');
//        Route::get('resend-verify', 'AuthorizationController@sendVerifyCode')->name('send.verify.code');
//        Route::post('verify-email', 'AuthorizationController@emailVerification')->name('verify.email');
//        Route::post('verify-sms', 'AuthorizationController@smsVerification')->name('verify.sms');
//        Route::post('verify-g2fa', 'AuthorizationController@g2faVerification')->name('go2fa.verify');

        Route::middleware(['checkStatus'])->group(function () {
//            Route::get('dashboard', 'UserController@home')->name('home');
//
//            Route::get('profile-setting', 'UserController@profile')->name('profile.setting');
//            Route::post('profile-setting', 'UserController@submitProfile');
//            Route::get('change-password', 'UserController@changePassword')->name('change.password');
//            Route::post('change-password', 'UserController@submitPassword');

            //2FA
//            Route::get('twofactor', 'UserController@show2faForm')->name('twofactor');
//            Route::post('twofactor/enable', 'UserController@create2fa')->name('twofactor.enable');
//            Route::post('twofactor/disable', 'UserController@disable2fa')->name('twofactor.disable');


            // Deposit
//            Route::any('/deposit', 'Gateway\PaymentController@deposit')->name('deposit');
//            Route::post('deposit/insert', 'Gateway\PaymentController@depositInsert')->name('deposit.insert');
//            Route::get('deposit/preview', 'Gateway\PaymentController@depositPreview')->name('deposit.preview');
//            Route::get('deposit/confirm', 'Gateway\PaymentController@depositConfirm')->name('deposit.confirm');
//            Route::get('deposit/manual', 'Gateway\PaymentController@manualDepositConfirm')->name('deposit.manual.confirm');
//            Route::post('deposit/manual', 'Gateway\PaymentController@manualDepositUpdate')->name('deposit.manual.update');
//            Route::any('deposit/history', 'UserController@depositHistory')->name('deposit.history');
//
//            Route::get('/transaction-logs', 'UserController@trxLog')->name('trx.log');
//            Route::post('/purchase-card', 'UserController@purchaseCard')->name('card.purchase');
//            Route::get('/my-cards', 'UserController@card')->name('card');
//            Route::get('/cards/details/{id}', 'UserController@cardDetails')->name('card.details');
//            Route::get('/cards/reload/{id}', 'UserController@reload')->name('card.reload');
//            Route::post('/cards/reload/confirm', 'UserController@reloadConfirm')->name('card.reload.confirm');
//            Route::get('/cards/transaction/{id}', 'UserController@cardTransaction')->name('card.transaction');
//            Route::get('/cards/transaction-filter', 'UserController@cardTransactionFilter')->name('card.transactionFilter');
//            Route::post('/cards/terminate-card', 'UserController@terminateCard')->name('card.terminate.card');


//            Route::get('withdraw',[\App\Http\Controllers\UserWithdrawMoneyController::class,'index'])->name('withdraw');
//            Route::get('withdraw',[\App\Http\Controllers\UserWithdrawMoneyController::class,'index'])->name('withdraw');
//            Route::post('withdraw_confirm',[\App\Http\Controllers\UserWithdrawMoneyController::class,'withdraw_confirm'])->name('withdraw_confirm');
////            Route::post('withdraw_confirm2',[\App\Http\Controllers\UserWithdrawMoneyController::class,'withdraw_confirm2'])->name('withdraw_confirm2');
//
//            Route::post('withdraw_confirm_done',[\App\Http\Controllers\UserWithdrawMoneyController::class,'withdraw_confirm_done'])->name('withdraw_confirm_done');
//            Route::get('withdraw_bonus',[\App\Http\Controllers\UserWithdrawMoneyController::class,'index2'])->name('withdraw_bonus');




        });
    });
});

Route::get('findsubcategory',[\App\Http\Controllers\UserWithdrawMoneyController::class,'pro']);

Route::get('/contact', 'SiteController@contact2')->name('contact');
//Route::get('/contact', 'SiteController@contact');
Route::post('/contact', 'SiteController@contactSubmit');
Route::get('/change/{lang?}', 'SiteController@changeLanguage')->name('lang');

Route::get('/cookie/accept', 'SiteController@cookieAccept')->name('cookie.accept');
Route::get('/{slug}/page/{id}', 'SiteController@policyPage')->name('policy.page');

//Route::get('cards', 'SiteController@card')->name('card');


//virtual Card
//Route::get('cards', 'CardController@index')->name('card');
//Route::get('cards/select/{id}', 'CardController@selectCard')->name('card.select')->middleware('auth');
//Route::get('cards/card-check-out', 'CardController@cardCheckOut')->name('card.checkOut')->middleware('auth');
//Route::post('cards/confirm', 'CardController@cardConfirm')->name('card.confirm')->middleware('auth');

//virtual card callback url
Route::post('flutter-wave-card-callback', 'CardController@cardCallBack')->name('flutterWave.callBack');



Route::get('category/{name}/{id}', 'SiteController@category')->name('category');
Route::get('card/details/{name}/{id}', 'SiteController@cardDetails')->name('card.details');

Route::get('blogs', 'SiteController@blogs')->name('blogs');
Route::get('blog/{slug}/{id}', 'SiteController@blogDetails')->name('blog.details');

Route::get('placeholder-image/{size}', 'SiteController@placeholderImage')->name('placeholder.image');

Route::get('/{slug}', 'SiteController@pages')->name('pages');
Route::get('/', 'SiteController@index')->name('home');
Route::get('/web/about',[\App\Http\Controllers\SiteController::class,'about'])->name('about_us');
