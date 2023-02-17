<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\Professionist;
use DateInterval;
use Illuminate\Http\Request;
use App\Models\Plan;
use Braintree\Gateway;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\DateTime;


class BraintreeController extends Controller
{
    public function generate(Professionist $professionist, Request $request, Gateway $gateway)
    {
        $userId = Auth::id();
        $plans = Plan::all();
        $professionistID = Professionist::where('user_id', $userId)->value('id');
        $professionist = Professionist::with('plans')->findOrFail($professionistID);
        $token = $gateway->clientToken()->generate();
        $leads = Lead::where('professionist_id', $professionistID)->get();
        $leadUnread = Lead::where('professionist_id', $professionistID)->where('read', 0)->get();

        foreach ($professionist->plans as $plan) {
            $start_date = $plan->pivot->subscription_start;
            $end_date = $plan->pivot->subscription_end;
            $plan_name = $plan->name;
        }
        if (!$professionist->plans->isEmpty()) {

            $start_date = Carbon::parse($start_date);
            $end_date = Carbon::parse($end_date);
            $now = Carbon::now('Europe/Rome');
            $differenzaOre = $end_date->diffInHours($now);

            return view('admin.Braintree.braintree', compact('professionist', 'leadUnread', 'plans', 'token', 'differenzaOre', 'plan_name'));
        } else {
            return view('admin.Braintree.braintree', compact('professionist', 'leadUnread', 'plans', 'token'));
        }
    }

    public function processPayment(Request $request, Gateway $gateway)
    {

        $professionist_id = Auth::id();
        $nonce = $request->input('payment_method_nonce');
        $plan_id = $request->input('plan');


        $plan = Plan::findOrFail($plan_id);

        $durata = $plan->duration;
        // $date_start = date('l');
        // dd( $date_start);
        // dd($nonce, $plan_id, $plan, $professionist_id);



        // $result = Braintree\Transaction::sale([
        //     'amount' => $plan->price,
        //     'paymentMethodNonce' => $nonce,
        //     'options' => ['submitForSettlement' => true]
        // ]);
        // if ($result->success) {
        //     return response()->json(['success' => true]);
        // } else {
        //     return response()->json(['success' => false]);
        // }

        $result = $gateway->transaction()->sale([
            'amount' => $plan->price,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);
        if ($result->success) {
            // $data = [
            //     'success' => true,
            //     'message' => 'transazione eseguita'
            // ];
            // return response()->json($data, 200);
            $professionist = Professionist::where('id', Auth::id())->first();




            $date_start = new DateTime();

            $date_start->add(new DateInterval("P" . $durata . "D"));

            $subscription_end = date_format($date_start, "Y-m-d H:i:s");
            $subscription_end = Carbon::parse($subscription_end);
            $now = Carbon::now('Europe/Rome');
            $diffenzaTempo = $subscription_end->diffInHours($now);
            // dd($subscription_end);

            // $professionist->plans()->attach($subscription_end);
            // if (!$professionist->plans()->wherePivot('professionist_id', $professionist_id)->exists() || $diffenzaTempo == 0) {
            $professionist->plans()->attach($plan_id, ["subscription_end" => $subscription_end]);
            // } else {
            // $planIds = [$plan_id];
            // $professionist->plans()->syncWithoutDetaching($plan_id, ["subscription_end" => $subscription_end->addDays($durata)]);
            // }



            // dd('Rollo Mattia aveva ragione');
            $userId = Auth::id();



            $professionists = Professionist::where('user_id', $userId)->get();
            $professionistID = Professionist::where('user_id', $userId)->value('id');

            // dd($professionists);

            $leads = Lead::where('professionist_id', $professionistID)->get();
            $leadUnread = Lead::where('professionist_id', $professionistID)->where('read', 0)->get();

            return redirect()->route('admin.professionists.index', compact('professionists', 'leadUnread'))->with('message', "Ottima scelta, hai acquistato una sponsorizzazione!");
        } else {

            dd('Pagamento Respinto');
        }

    }

}
