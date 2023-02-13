<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Professionist;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfessionistController extends Controller
{
    public function index(Request $request)
    {
        // $technology_id = $request->get('technology_id');

        // $filter_professionists = DB::table('technologies')
        // ->join('professionist_technology', function($join){

        //     $join->on('technologies.id', '=', 'professionist_technology.technology_id')
        //     ->where('professionist_technology.technology_id', '=', );
        // })
        // ->join('professionists','professionist_technology.professionist_id', '=', 'professionists.id')
        // ->get();

        $selectedOptionId = $request->get('technology_id');
        $professionists = Professionist::whereHas('technologies', function ($query) use ($selectedOptionId) {
            $query->where('technology_id', $selectedOptionId);
        })->get();

        // return response()->json($professionists);

        // $professionists = Professionist::all();
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
