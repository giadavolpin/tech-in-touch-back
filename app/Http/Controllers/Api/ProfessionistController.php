<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Professionist;
use App\Models\Technology;
use App\Models\Project;
use App\Models\Review;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Nette\Utils\DateTime;

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
            $query->where('technology_id', $selectedOptionId)
            ->where('visible', 1);
        })
        ->get();

        // return response()->json($professionists);

        // $professionists = Professionist::all();
        return response()->json([
            'success' => true,
            'results' => $professionists
        ]);
    }
    public function avgVote(Request $request)
    {


        $professionistId = $request->singleProfessionistID;
        // dd($professionistId);

        $professionist = Professionist::find($professionistId);

        $reviews = $professionist->reviews;
        if (count($reviews) == 0) {
            return response()->json([
                'success' => true,
                'results' => $professionist
            ]);
        }

        $allreviews = [];

        foreach ($reviews as $review) {
            $vote = $review->vote_id;
            array_push($allreviews, $vote);
        }

        $sum = array_sum($allreviews);

        $count = count($allreviews);

        $avarage = $sum / $count;

        DB::table('professionists')
            ->where('id', $professionistId)
            ->update(['avg_vote' => $avarage]);



        return response()->json([
            'success' => true,
            'results' => $avarage
        ]);
    }

    public function data()
    {
        $professionists = Professionist::all();
        $technologies = Technology::all();
        $votes = Vote::all();
        return response()->json([
            'success' => true,
            'results' => [$technologies, $professionists, $votes]
        ]);
    }

    public function show($slug)
    {
        $professionist = Professionist::where('slug', $slug)->with('technologies')->first();

        $professionistID = Professionist::where('slug', $slug)->value('id');

        $projectPro = Project::where('professionist_id', $professionistID)->get();
        $data = DB::table('reviews')
            ->where('professionist_id', $professionistID)
            ->get();

        return response()->json([
            'success' => true,
            'results' => [$professionist, $projectPro, $data]
        ]);


    }
    public function proPlan()
    {



        $professionist = Professionist::whereHas('plans', function($query){
            $date_now = new DateTime();
            $query->where('subscription_end','>=', $date_now)
            ->where('visible', 1);

        })->with('technologies', 'reviews')->inRandomOrder()->get();

        return response()->json([
            'success' => true,
            'results' => [ $professionist]
        ]);


    }
}
