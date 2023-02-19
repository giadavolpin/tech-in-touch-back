<?php

namespace App\Http\Controllers\Admin;

use App\Models\Lead;
use App\Models\Professionist;
use App\Models\Review;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{

    public function index()
    {

        $userId = Auth::id();
        $professionistID = Professionist::where('user_id', $userId)->value('id');

        $reviews = Review::where('professionist_id', $professionistID)->get();
       $leads = Lead::where('professionist_id', $professionistID)->get();

       $leadUnread = Lead::where('professionist_id', $professionistID)->where('read', 0)->get();

        return view('admin.reviews.index', compact('reviews', 'leadUnread'));
    }


    public function show(Review $review){
        $userId = Auth::id();

        $professionistID = Professionist::where('user_id', $userId)->value('id');

        //dd($review);
       
       $leads = Lead::where('professionist_id', $professionistID)->get();

       $leadUnread = Lead::where('professionist_id', $professionistID)->where('read', 0)->get();
        return view('admin.reviews.show', compact('review','leadUnread'));

    }

   
}