<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Professionist;
use App\Models\Technology;
use App\Models\Project;

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


        $selectedOptionId = $request->input('technology_id');

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
    public function avgVote(){
      /*   $avg_stars = DB::table('reviews')
                ->avg('vote_id'); */
                
               $data = DB::table('professionists')
                ->join('reviews','professionists.id', '=', 'reviews.professionist_id')
    ->select(DB::raw('avg(vote_id)'))
    ->groupBy('professionist_id')
    ->orderByDesc('avg')
    ->get();

   $prova = DB::table('reviews')
    ->join('professionists','professionists.id', '=', 'reviews.professionist_id')
 
    ->whereRaw('professionists.id = reviews.professionist_id')
    //->select(DB::raw('avg(vote_id) as avg, professionist_id')) 
    ->update(['avg_vote' => $data]);



    
        return response()->json([
            'success' => true,
            'results' => $prova
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
        $professionist = Professionist::where('slug', $slug)->with('technologies')->first();

        $professionistID = Professionist::where('slug', $slug)->value('id');

        $projectPro = Project::where('professionist_id', $professionistID)->get();
        $data = DB::table('reviews')
    ->select(DB::raw('avg(vote_id) as avg, professionist_id'))
    ->groupBy('professionist_id')
    ->orderByDesc('avg')
    ->get();

        return response()->json([
            'success' => true,
            'results' =>  [$professionist, $projectPro,$data]
        ]);
    }
}
