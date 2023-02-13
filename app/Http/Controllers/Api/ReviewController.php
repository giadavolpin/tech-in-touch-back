<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'vote_id' => 'required',
            'comment' => 'nullable',
            'professionist_id' => 'nullable'
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }
        else {
            $new_review = new Review();
            $new_review->fill($data);
            $new_review->save();


            return response()->json([
                'success' => true

            ]);
        }
    }
}
