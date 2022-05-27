<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Card;
use App\Models\Virtualtransactions;
use Illuminate\Http\Request;
use App\Models\VirtualCard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class VirtualCardController extends Controller
{
    public function card(){
        $pageTitle = 'All Card';
        $emptyMessage  = 'Data Not Found';

//        $curl = curl_init();
//        curl_setopt_array($curl, array(
//            CURLOPT_URL => "https://api.flutterwave.com/v3/virtual-cards",
//            CURLOPT_RETURNTRANSFER => true,
//            CURLOPT_ENCODING => "",
//            CURLOPT_MAXREDIRS => 10,
//            CURLOPT_TIMEOUT => 0,
//            CURLOPT_FOLLOWLOCATION => true,
//            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//            CURLOPT_CUSTOMREQUEST => "GET",
//            CURLOPT_HTTPHEADER => array(
//                "Content-Type: application/json",
//                "Authorization: Bearer " . env('SECRET_KEY')
//            ),
//        ));
//        $response = curl_exec($curl);
//        curl_close($curl);
//        $cards = json_decode($response);
        //return $cards;
        $virtual_cards = VirtualCard::paginate(20);
//        foreach ($virtual_cards as $virtual_card){
//            foreach ($cards->data as $card){
//                if ($card->id == $virtual_card->card_id){
//                    $virtual_card->live_amount = $card->amount;
//                    $virtual_card->currency = $card->currency;
//                }
//            }
//        }

        return view('admin.virtual-card.card.card',[
            'cards'=> $virtual_cards,
            'emptyMessage'=>$emptyMessage,
            'pageTitle'=>$pageTitle,
        ]);
    }

    private function searchNotSavedCard($cards, $search_card_id) {
        foreach ($cards as $card) {
            if ($card->card_id == $search_card_id){
                return false;
            } else {
                return true;
            }
        }
    }

    public function filterVirtualCard(Request $request, VirtualCard $query) {

        $name = $request->name;
        $card_no = $request->card_no;

        $query = $query->newQuery();
        if (!empty($name))
            $query->where('name_on_card', 'LiKE', '%'.$name.'%');
        if (!empty($card_no))
            $query->where('card_pan', $card_no);
        $virtual_cards = $query->paginate(20);

        //return $cards;
//        $curl = curl_init();
//        curl_setopt_array($curl, array(
//            CURLOPT_URL => "https://api.flutterwave.com/v3/virtual-cards?page1",
//            CURLOPT_RETURNTRANSFER => true,
//            CURLOPT_ENCODING => "",
//            CURLOPT_MAXREDIRS => 10,
//            CURLOPT_TIMEOUT => 0,
//            CURLOPT_FOLLOWLOCATION => true,
//            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//            CURLOPT_CUSTOMREQUEST => "GET",
//            CURLOPT_HTTPHEADER => array(
//                "Content-Type: application/json",
//                "Authorization: Bearer " . env('SECRET_KEY')
//            ),
//        ));
//        $response = curl_exec($curl);
//        curl_close($curl);
//        $cards = json_decode($response);
//
//        foreach ($virtual_cards as $virtual_card){
//            foreach ($cards->data as $card){
//                if ($card->id == $virtual_card->card_id){
//                    $virtual_card->live_amount = $card->amount;
//                    $virtual_card->currency = $card->currency;
//                }
//            }
//        }

        $pageTitle = 'All Card';
        $emptyMessage  = 'Data Not Found';
        return view('admin.virtual-card.card.card',[
            'cards'=> $virtual_cards,
            'emptyMessage'=>$emptyMessage,
            'pageTitle'=>$pageTitle,
            'searched'=> true,
            'name'=> $name,
            'card_no'=> $card_no,
        ]);

    }

    public function card_transaction(Request $request){
        $request->validate([
           'card_id'=> 'required'
        ]);

        $id = $request->card_id;

        $pageTitle = 'Transaction History';
        $emptyMessage  = 'Data Not Found';
        $start_date = date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "-12 month" ) );
        $end_date = date('Y-m-d');
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL =>  env('Flutter_wave_url')."virtual-cards/".$id."/transactions?from=".date('Y-m-d',strtotime($start_date))."&to=".$end_date."&index=0&size=2147483647",
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
        return response()->json([
            'transaction'=>json_decode($response),
            'emptyMessage'=>$emptyMessage,
            'transaction_id'=>$id,
            'start_date'=>$start_date,
            'end_date'=>$end_date,
        ]);

    }


    public function card_details($card_id){
        $card = VirtualCard::where('card_id','=',$card_id)->first();
        if ($card->user_id == auth()->user()->id){
            if ($card){
                return response()->json([
                    'status'=>200,
                    'user'=>auth()->user(),
                    'card_details'=>$card
                ]);
            }else{
                return response()->json([
                    'status'=>401,
                    'message'=>'card not found'
                ]);
            }
        }else{
            return response()->json([
                'status'=>401,
                'message'=>'This is not your card'
            ]);
        }


    }




    public function transactionDetails($id){
        $pageTitle = 'Transaction History';
        $emptyMessage  = 'Data Not Found';
        $start_date = date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "-12 month" ) );
        $end_date = date('Y-m-d');
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL =>  env('Flutter_wave_url')."virtual-cards/".$id."/transactions?from=".date('Y-m-d',strtotime($start_date))."&to=".$end_date."&index=0&size=2147483647",
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
        return view('admin.virtual-card.card.transaction-details',[
            'transaction'=>json_decode($response),
            'emptyMessage'=>$emptyMessage,
            'pageTitle'=>$pageTitle,
            'transaction_id'=>$id,
            'start_date'=>$start_date,
            'end_date'=>$end_date,
        ]);
    }

    public function filterTransactionDetails(Request $request){
        $pageTitle = 'Transaction History';
        $emptyMessage  = 'Data Not Found';
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $id = $request->card_id;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL =>  env('Flutter_wave_url')."virtual-cards/".$id."/transactions?from=".date('Y-m-d',strtotime($start_date))."&to=".date('Y-m-d', strtotime($end_date))."&index=0&size=2147483647",
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

        return view('admin.virtual-card.card.transaction-details',[
            'transaction'=>json_decode($response),
            'emptyMessage'=>$emptyMessage,
            'pageTitle'=>$pageTitle,
            'transaction_id'=>$id,
            'start_date'=>$start_date,
            'end_date'=>$end_date,
        ]);
    }

    public function cardTerminate(Request $request)
    {
        $id = $request->card_id;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL =>  env('Flutter_wave_url')."virtual-cards/".$id."/terminate",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authorization: Bearer " . env('SECRET_KEY')
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($response, true);

        if (isset($result)) {
            if ( $result['status'] === 'success' && array_key_exists('data', $result) ) {
                $card = VirtualCard::where('card_id', $id)->first();
                $card->terminate = 1;
                $card->save();
                $notify[] = ['success','Virtual card terminated successfully.'];
            }else{
                $notify[] = ['error','Something went wrong.'];
            }
        }

        return back()->withNotify($notify);
    }

    public function cardBlock(Request $request)
    {
        $id = $request->card_id;
        $status = $request->status;

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL =>  env('Flutter_wave_url')."virtual-cards/".$id."/status/".$status,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authorization: Bearer " . env('SECRET_KEY')
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        $result = json_decode($response, true);

        if (isset($result)) {
            if ( $result['status'] === 'success' && array_key_exists('data', $result)) {
                $card = VirtualCard::where('card_id', $id)->first();
                $card->is_active = 0;
                $card->save();
                $notify[] = ['success', 'Virtual card blocked successfully.'];
            } else if ( $result['status'] === 'error' && $result['message'] === 'Card has been blocked previously' ) {
                $card = VirtualCard::where('card_id', $id)->first();
                $card->is_active = 0;
                $card->save();
                $notify[] = ['success', 'Card has been blocked previously.'];
            } else {
                $notify[] = ['error', 'Something went wrong.'];
            }
        }

        return back()->withNotify($notify);
    }


    public function allVirtualCardTransaction(Request $request){
        $pageTitle = 'All Virtual Card Transaction';
        $emptyMessage  = 'Data Not Found';
        $start_date = date("Y-m-d", strtotime( date( "Y-m-d", strtotime( date("Y-m-d") ) ) . "-48 month" ) );
        $end_date = date('Y-m-d');

        $allVirtualTransaction = Virtualtransactions::orderBy('created_at', 'desc')->paginate(20);

        //return $allVirtualTransaction;

        return view('admin.virtual-card.card.virtual-transaction',[
            'transactions'=> $allVirtualTransaction,
            'emptyMessage'=> $emptyMessage,
            'pageTitle'=> $pageTitle,
        ]);
    }

    public function filterVirtualTransaction(Request $request, Virtualtransactions $query) {
        $pageTitle = 'All Virtual Card Transaction';
        $emptyMessage  = 'Data Not Found';

        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $id = $request->card_id;

        $query = $query->newQuery();

        if (!empty($start_date)){
            $today = date('Y-m-d');
            $query->whereBetween('created_at', [date('Y-m-d', strtotime($start_date)) .' 00:00:00', date('Y-m-d', strtotime($today)).' 23:59:59']);
        }
        if (!empty($end_date)){
            $first_data = Virtualtransactions::orderBy('created_at', 'asc')->first();
            if ($first_data){
                $old = date('Y-m-d', strtotime($first_data->created_at));
            }else {
                $old = '2020-01-01';
            }
            $query->whereBetween('created_at', [date('Y-m-d', strtotime($old)) .' 00:00:00', date('Y-m-d', strtotime($end_date)).' 23:59:59']);
        }
        if (!empty($start_date) && !empty($end_date)){
            $query->whereBetween('created_at', [date('Y-m-d', strtotime($start_date)) .' 00:00:00', date('Y-m-d', strtotime($end_date)).' 23:59:59']);
        }
        $allVirtualTransaction = $query->paginate(20);

        $allVirtualTransaction->appends(['start_date' => $start_date, 'end_date' => $end_date]);

        return view('admin.virtual-card.card.virtual-transaction',[
            'transactions'=> $allVirtualTransaction,
            'emptyMessage'=> $emptyMessage,
            'pageTitle'=> $pageTitle,
            'start_date'=> $start_date,
            'end_date'=> $end_date,
        ]);
    }

}
