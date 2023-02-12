<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Professionist;
use App\Models\Technology;
use Illuminate\Http\Request;

class ProfessionistController extends Controller
{
    public function index()
    {

        $professionists = Professionist::all();
        return response()->json([
            'success' => true,
            'results' => $professionists
        ]);
    }

    public function data()
    {
        $professionists = Professionist::all();
        $technologies = Technology::all();
        return response()->json([
            'success' => true,
            'results' => [$technologies , $professionists]
        ]);
    }

    public function show($slug)
    {
        $professionist = Professionist::where('slug', $slug)->first();

        return response()->json([
            'success' => true,
            'results' =>  $professionist
        ]);
    }
}
