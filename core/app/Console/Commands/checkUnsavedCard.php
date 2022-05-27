<?php

namespace App\Console\Commands;

use App\Models\Charge;
use App\Models\CreateCardRequest;
use App\Models\History;
use App\Models\Plan;
use App\Models\Transaction;
use App\Models\User;
use App\Models\VirtualCard;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class checkUnsavedCard extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'card:cuc';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check unsaved virtual card';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        
        //delete success request
        $successCreateCardRequest = CreateCardRequest::where('status', 1)->get();
        if (count($successCreateCardRequest)){
            foreach ($successCreateCardRequest as $sItem) {
                CreateCardRequest::find($sItem->id)->delete();
            }
        }

        $createCardRequest = CreateCardRequest::where('status', 0)->get();
        if (count($createCardRequest)){
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => env('Flutter_wave_url')."virtual-cards",
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
            $cards = json_decode($response);

            //add unsaved new cards;
            $all_virtual_cards = VirtualCard::all();
            $unsavedCard = [];
            foreach ($cards->data as $card){
                $searchCardInDb = array_search($card->id, array_column($all_virtual_cards->toArray(), 'card_id'));
                if($searchCardInDb === false){
                    $unsavedCard[] = $card;
                }
            }
            if (count($unsavedCard)) {
                foreach ($unsavedCard as $us_card){

                    if ($us_card->callback_url){
                        if ( strlen( getOnlyUrl($us_card->callback_url) ) > 10 ) {
                            $callBackUrl = $us_card->callback_url;
                            $c_user_id = (int) getParamFromUrl($callBackUrl, 'c_user_id');
                            $c_plan_id = (int) getParamFromUrl($callBackUrl, 'c_plan_id');
                            $c_amount = (double) getParamFromUrl($callBackUrl, 'c_amount');
                            $c_total_amount = (double) getParamFromUrl($callBackUrl, 'c_total_amount');
                            $c_card_bg = getParamFromUrl($callBackUrl, 'c_card_bg');
                            $c_temp_id = getParamFromUrl($callBackUrl, 'c_temp_id');
                            $c_trx = getParamFromUrl($callBackUrl, 'c_trx');

                            if ($c_temp_id) {
                                $plan = Plan::find($c_plan_id);
                                //Save Card
                                $v_card = new VirtualCard();
                                $v_card->user_id = $c_user_id;
                                $v_card->card_id = $us_card->id;
                                $v_card->plan_id = $plan->id;
                                $v_card->name = $us_card->name_on_card;
                                $v_card->account_id = $us_card->account_id;
                                $v_card->card_hash = $us_card->id;
                                $v_card->card_pan = $us_card->card_pan;
                                $v_card->masked_card = $us_card->masked_pan;
                                $v_card->cvv = $us_card->cvv;
                                $v_card->expiration = $us_card->expiration;
                                $v_card->card_type = $us_card->card_type;
                                $v_card->name_on_card = $us_card->name_on_card;
                                $v_card->callback = $us_card->callback_url;
                                $v_card->ref_id = $c_trx;
                                $v_card->secret = $c_trx;
                                $v_card->bg = $c_card_bg;
                                $v_card->city = $us_card->city;
                                $v_card->state = $us_card->state;
                                $v_card->zip_code = $us_card->zip_code;
                                $v_card->address = $us_card->address_1;
                                $v_card->amount = $us_card->amount;
                                $v_card->currency = $us_card->currency;
                                $v_card->charge = $c_total_amount - $c_amount;
                                if ($us_card->is_active) {
                                    $v_card->is_active = 1;
                                } else {
                                    $v_card->is_active = 0;
                                }
                                $v_card->funding = $plan->funding;
                                $v_card->terminate = 0;
                                $v_card->save();


                                $cardIsSaved = VirtualCard::where('card_id', $us_card->id)->first();
                                if ($cardIsSaved) {
                                    //Credit Card creation Charge
                                    $charge = new Charge();
                                    $charge->user_id = $c_user_id;
                                    $charge->ref_id = $c_trx;
                                    $charge->amount = $c_total_amount;
                                    $charge->log = 'Virtual Card creation charge #';
                                    $charge->save();

                                    //History
                                    $his = new History();
                                    $his->user_id = $c_user_id;
                                    $his->ref_id = $c_trx;
                                    $his->amount = $c_total_amount;
                                    $his->type = "Card Creation";
                                    $his->save();

                                    //Debit User
                                    $user = User::find($c_user_id);
                                    $user->balance = $user->balance - $c_total_amount;
                                    $user->save();


                                    // transaction
                                    $transaction = new Transaction();
                                    $transaction->user_id = $user->id;
                                    $transaction->amount = $c_amount;
                                    $transaction->post_balance = $user->balance;
                                    $transaction->charge = $c_total_amount - $c_amount;
                                    $transaction->trx_type = '-';
                                    $transaction->details = 'Purchased new card, Card No: ' . $us_card->card_pan;
                                    $transaction->trx = $c_trx;
                                    $transaction->save();


                                    //delete temporary card creation request;

                                    $deleteCreateCardRequest = CreateCardRequest::where('user_id', $c_user_id)->where('temp_id', $c_temp_id)->first();
                                    if ($deleteCreateCardRequest) {
                                        $deleteCreateCardRequest->status = 1;
                                        $deleteCreateCardRequest->save();
                                    }


                                    // Send Email
                                    $type = "CARD_BUY";
                                    $shortCodes = [
                                        'price' => $c_total_amount,
                                        'currency' => $v_card->currency,
                                        'purchase_at' => date('d-m-Y', strtotime($v_card->created_at)),
                                        'trx' => $c_trx,
                                        'post_balance' => $v_card->amount,
                                    ];
                                    sendEmail($user, $type, $shortCodes);
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
