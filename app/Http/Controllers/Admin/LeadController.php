<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Professionist;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadController extends Controller
{
    public function index(Request $request)
    {

        $userId = Auth::id();
        $professionistID = Professionist::where('user_id', $userId)->value('id');

        $leads = Lead::where('professionist_id', $professionistID)->get();
       // dd($leads);

        return view('admin.leads.index', compact('leads'));
    }

    public function show(){

    }

    public function destroy(Lead $lead){

        $lead->delete();
        return redirect()->route('admin.leads.index')->with('message', " Il messaggio di $lead->name è stato cancellato correttamente");

    }
}
