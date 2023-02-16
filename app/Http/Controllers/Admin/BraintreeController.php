<?php

namespace App\Http\Controllers\Admin;

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
    // public function generate(Request $request, Gateway $gateway)
    // {
    //     $token = $gateway->clientToken()->generate();
    //     $data = [
    //         'success' => true,
    //         'token' => $token
    //     ];

    //     return redirect()->route('admin.professionists.show', compact($token));

    // }

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

            $date_start->add(new DateInterval("P".$durata."D"));

            $subscription_end = date_format($date_start,"Y-m-d H:i:s");

            // dd($subscription_end);

            // $professionist->plans()->attach($subscription_end);

            $professionist->plans()->attach($plan_id, ["subscription_end"=>$subscription_end]);


            // dd('Rollo Mattia aveva ragione');
            $userId = Auth::id();



            $professionists = Professionist::where('user_id', $userId)->get();
            $professionistID = Professionist::where('user_id', $userId)->value('id');

            // dd($professionists);

            $leads = Lead::where('professionist_id', $professionistID)->get();
            $leadUnread = Lead::where('professionist_id', $professionistID)->where('read', 0)->get();

            return redirect()->route('admin.professionists.index', compact('professionists', 'leadUnread'));
        } else {

            dd('non funziona un cazzo');
        }

    }

}
