<?php

namespace App\Http\Controllers\Admin;

use App\Models\Professionist;
use App\Http\Requests\StoreProfessionistRequest;
use App\Http\Requests\UpdateProfessionistRequest;

class ProfessionistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProfessionistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProfessionistRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Professionist  $professionist
     * @return \Illuminate\Http\Response
     */
    public function show(Professionist $professionist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Professionist  $professionist
     * @return \Illuminate\Http\Response
     */
    public function edit(Professionist $professionist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfessionistRequest  $request
     * @param  \App\Models\Professionist  $professionist
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProfessionistRequest $request, Professionist $professionist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Professionist  $professionist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Professionist $professionist)
    {
        //
    }
}