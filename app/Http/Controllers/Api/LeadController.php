<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class LeadController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'professionist_id' => 'nullable'
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }
        else {
            $new_lead = new Lead();
            $new_lead->fill($data);
            $new_lead->save();


            return response()->json([
                'success' => true

            ]);
        }
    }
}
