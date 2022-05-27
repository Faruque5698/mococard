<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        $pageTitle = 'Manage Plan';
        $emptyMessage  = 'Data Not Found';
        return view('admin.virtual-card.plan.plan',[
            'plans' => $plans,
            'emptyMessage' => $emptyMessage,
            'pageTitle' => $pageTitle,
        ]);
    }

    public function create()
    {
        $pageTitle = 'Crate Plan';
        $emptyMessage  = 'Data Not Found';
        return view('admin.virtual-card.plan.create-plan',[
            'emptyMessage' => $emptyMessage,
            'pageTitle' => $pageTitle,
        ]);
    }


    public function store(Request $request)
    {
      $request->validate([
         'name' => 'required',
         'card_issuance_fee' => 'required',
         'card_load_fee' => 'required',
         'card_load_fee_percentage' => 'required',
         'min_load' => 'required',
         'max_load' => 'required',
      ]);

      DB::beginTransaction();
        try {
            $plan = new Plan();
            $plan->name = $request->name;
            $plan->card_issuance_fee = $request->card_issuance_fee;
            $plan->card_load_fee = $request->card_load_fee;
            $plan->card_load_fee_percentage = $request->card_load_fee_percentage;
            $plan->min_load = $request->min_load;
            $plan->max_load = $request->max_load;
            $plan->save();
            DB::commit();
            $notify[] = ['success', 'Plan create Successfully'];
            return redirect()->route('admin.virtualCard.plan')->withNotify($notify);
        }catch (\Exception $ex){
            DB::rollBack();
            return back()->with('error_msg', $ex->getMessage());
        }
    }

    public function edit($id)
    {
        $plan = Plan::find($id);
        $pageTitle = 'Edit Plan';
        $emptyMessage  = 'Data Not Found';
        return view('admin.virtual-card.plan.edit-plan',[
            'emptyMessage' => $emptyMessage,
            'pageTitle' => $pageTitle,
            'plan' => $plan,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'card_issuance_fee' => 'required',
            'card_load_fee' => 'required',
            'card_load_fee_percentage' => 'required',
            'min_load' => 'required',
            'max_load' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $plan = Plan::find($id);
            $plan->name = $request->name;
            $plan->card_issuance_fee = $request->card_issuance_fee;
            $plan->card_load_fee = $request->card_load_fee;
            $plan->card_load_fee_percentage = $request->card_load_fee_percentage;
            $plan->min_load = $request->min_load;
            $plan->max_load = $request->max_load;
            $plan->save();
            DB::commit();
            $notify[] = ['success', 'Plan updated Successfully'];
            return redirect()->route('admin.virtualCard.plan')->withNotify($notify);
        }catch (\Exception $ex){
            DB::rollBack();
            return back()->with('error_msg', $ex->getMessage());
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $plan = Plan::find($id);
        $plan->delete();
        $notify[] = ['success', 'Plan deleted Successfully'];
        return redirect()->route('admin.virtualCard.plan')->withNotify($notify);
    }

    public function planTypeChange(Request $request) {
        $type = $request->type;
        $id = $request->id;
        $status = $request->status;
        $plan = Plan::find($id);

        if ($type == 'funding') {
            $plan->funding = (int) $status;
        }
        if ($type == 'block') {
            $plan->block = (int) $status;
        }
        if ($type == 'terminate') {
            $plan->terminate = (int) $status;
        }
        if ($type == 'status') {
            $plan->status = (int) $status;
        }
        $plan->save();
        return response()->json(['plan' => $plan], 200);
    }
}
