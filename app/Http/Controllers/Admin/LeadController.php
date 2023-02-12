<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadController extends Controller
{
    public function index()
    {

        $userId = Auth::id();
        $leads = Lead::where('professionist_id', $userId)->get();
        // dd($leads);

        return view('admin.leads.index', compact('leads'));
    }
}
