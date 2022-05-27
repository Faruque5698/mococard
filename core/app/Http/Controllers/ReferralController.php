<?php

namespace App\Http\Controllers;

use App\Models\RefferBonusSettings;
use App\Models\User;
use Illuminate\Http\Request;

class ReferralController extends Controller
{

    public function index(){
        $pageTitle = "Referral Settings";
        return view('admin.referral',[
            'pageTitle'=>$pageTitle
        ]);
    }

    public function save(Request $request){
        $request->validate([
           'new_user_bonus'=>'required|numeric',
           'refer_bonus'=>'required|numeric',
        ]);

        $referral = RefferBonusSettings::find(1);
        if ($referral){
            $referral->new_user_bonus = $request->new_user_bonus;
            $referral->refer_by_bonus = $request->refer_bonus;
            $referral->save();
        }else{
            $refer = new RefferBonusSettings();
            $refer->id = 1;
            $refer->new_user_bonus = $request->new_user_bonus;
            $refer->refer_by_bonus = $request->refer_bonus;
            $refer->save();
        }

        return back()->with('message','Updated Successfully');


    }


    public function refer($user_id,$username){
        $refer = User::find($user_id);

//
        if ($refer){
            return redirect()->route('user.register')->with(['refer_username'=>$refer->id]);
//            return ;
        }
    }
}
