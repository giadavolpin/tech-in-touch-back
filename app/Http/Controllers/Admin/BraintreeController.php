<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\Professionist;
use Illuminate\Http\Request;
use App\Models\Plan;
use Braintree\Gateway;
use Illuminate\Support\Facades\Auth;


class BraintreeController extends Controller
{
    public function generate(Professionist $professionist, Request $request, Gateway $gateway)
    {
        $userId = Auth::id();
        $plans = Plan::all();
        $token = $gateway->clientToken()->generate();
        $professionistID = Professionist::where('user_id', $userId)->value('id');
        $leads = Lead::where('professionist_id', $professionistID)->get();
        $leadUnread = Lead::where('professionist_id', $professionistID)->where('read', 0)->get();
        // if ($professionist->user_id !== Auth::id()) {
        //     abort(403);
        // }
        // $token = $gateway->clientToken()->generate();

        return view('admin.Braintree.braintree', compact('professionist', 'leadUnread', 'plans', 'token'));

    }

    public function processPayment(Request $request, Gateway $gateway)
    {

        $professionist_id = Auth::id();
        $nonce = $request->input('payment_method_nonce');
        $plan_id = $request->input('plan');

        $plan = Plan::findOrFail($plan_id);

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


            $professionist->plans()->attach($plan_id);
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
