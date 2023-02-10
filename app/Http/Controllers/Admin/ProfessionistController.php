<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Routing\Controller;
use App\Models\Professionist;
use App\Http\Requests\StoreProfessionistRequest;
use App\Http\Requests\UpdateProfessionistRequest;
use App\Models\Project;
use App\Models\Technology;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfessionistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {

        $userId = Auth::id();
        $professionists = Professionist::where('user_id', $userId)->get();
        // dd($professionists);

        return view('admin.professionists.index', compact('professionists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $userId = Auth::id();
        $professionists = Professionist::where('user_id', $userId)->get();
        $professionistID = Professionist::where('user_id', $userId)->value('id');
        // dd($professionistID);


        //

        $projects = Project::all();
        $technologies = Technology::all();

        if (!is_null($professionistID)) {
            // dd($professionists)
            return view('admin.professionists.index', compact('professionists'));

        } else {
            return view('admin.professionists.create', compact('projects', 'technologies', 'professionists'));
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProfessionistRequest  $request
     */
    public function store(StoreProfessionistRequest $request)
    {

        $userId = Auth::id();
        $data = $request->validated();
        $slug = Professionist::generateSlug($request->nickname);
        $data['slug'] = $slug;
        $data['user_id'] = $userId;
        if ($request->hasFile('profile_image')) {
            $path = Storage::put('professionists_images', $request->profile_image);
            $data['profile_image'] = $path;
        }
        if ($request->hasFile('cv_path')) {
            $path = Storage::put('professionists_images', $request->cv_path);
            $data['cv_path'] = $path;
        }

        $new_professionist = Professionist::create($data);

        if ($request->has('technologies')) {
            $new_professionist->technologies()->attach($request->technologies);
        }

        return redirect()->route('admin.professionists.index', $new_professionist->slug)->with('message', "Profilo creato con successo");
        ;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Professionist  $professionist
     */
    public function show(Professionist $professionist)
    {
        if ($professionist->user_id !== Auth::id()) {
            abort(403);
        }
        return view('admin.professionists.show', compact('professionist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Professionist  $professionist
     */
    public function edit(Professionist $professionist)
    {
        // if (!Auth::user()->isAdmin() && $professionist->user_id !== Auth::id()) {
        //     abort(403);
        // }
        $projects = Project::all();
        $technologies = Technology::all();
        // if (!Auth::user()->isAdmin() && $professionist->user_id !== Auth::id()) {
        //     abort(403);
        // }
        return view('admin.professionists.edit', compact('professionist', 'projects', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProfessionistRequest  $request
     * @param  \App\Models\Professionist  $professionist
     */
    public function update(UpdateProfessionistRequest $request, Professionist $professionist)
    {
        // if (!Auth::user()->isAdmin() && $professionist->user_id !== Auth::id()) {
        //     abort(403);
        // }
        $data = $request->validated();
        $slug = Professionist::generateSlug($request->name, $request->surname);
        $data['slug'] = $slug;
        if ($request->hasFile('profile_image')) {
            if ($professionist->profile_image) {
                Storage::delete($professionist->profile_image);
            }

            $path = Storage::put('professionist_images', $request->profile_image);
            $data['profile_image'] = $path;
        }
        if ($request->hasFile('cv_path')) {
            $path = Storage::put('professionists_images', $request->cv_path);
            $data['cv_path'] = $path;
        }


        $professionist->update($data);

        if ($request->has('technologies')) {
            $professionist->technologies()->sync($request->technologies);
        } else {
            $professionist->technologies()->sync([]);
        }
        return redirect()->route('admin.professionists.index')->with('message', "$professionist->slug aggiornato con successo");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Professionist  $professionist
     */
    public function destroy(Professionist $professionist)
    {
        // if (!Auth::user()->isAdmin() && $professionist->user_id !== Auth::id()) {
        //     abort(403);
        // }
        if ($professionist->profile_image) {
            Storage::delete($professionist->profile_image);
        }
        if ($professionist->cv_path) {
            Storage::delete($professionist->cv_path);
        }
        $professionist->delete();

        return redirect()->route('admin.professionists.index')->with('message', "$professionist->slug cancellato con successo");
    }
}
