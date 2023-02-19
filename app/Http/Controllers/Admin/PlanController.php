<?php

namespace App\Http\Controllers\Admin;


use App\Models\Plan;
use App\Models\Professionist;
use App\Models\Lead;
use App\Http\Requests\StorePlanRequest;
use App\Http\Requests\UpdatePlanRequest;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\DateTime;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {

        $userId = Auth::id();
        $professionistID = Professionist::where('user_id', $userId)->value('id');
        $professionist = Professionist::with('plans')->findOrFail($professionistID);

        // $date_now = new DateTime();

        // $plans_end =  $professionist->plans()->value('subscription_end');
        // $plans_pro =  $professionist->plans()->get();

        // if($plans_end < $date_now){
        //     $professionist = [];
        // }


        // dd($date_now < $date_now2);

        $leads = Lead::where('professionist_id', $professionistID)->get();

        $leadUnread = Lead::where('professionist_id', $professionistID)->where('read', 0)->get();





        return view('admin.payments.index', compact('professionist', 'leadUnread'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlanRequest  $request
     */
    public function store(StorePlanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     */
    public function edit(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlanRequest  $request
     * @param  \App\Models\Plan  $plan
     */
    public function update(UpdatePlanRequest $request, Plan $plan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     */
    public function destroy(Plan $plan)
    {
        //
    }
}
