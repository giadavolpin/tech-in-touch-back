<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Routing\Controller;
use App\Models\Professionist;
use App\Http\Requests\StoreProfessionistRequest;
use App\Http\Requests\UpdateProfessionistRequest;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Plan;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Lead;
use Braintree\Gateway;

use function PHPUnit\Framework\isEmpty;

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
        $professionistID = Professionist::where('user_id', $userId)->value('id');

        // dd($professionists);

        $leads = Lead::where('professionist_id', $professionistID)->get();
        $leadUnread = Lead::where('professionist_id', $professionistID)->where('read', 0)->get();

        return view('admin.professionists.index', compact('professionists', 'leadUnread'));
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

        $leads = Lead::where('professionist_id', $professionistID)->get();
        $leadUnread = Lead::where('professionist_id', $professionistID)->where('read', 0)->get();

        $projects = Project::all();
        $technologies = Technology::all();

        if (!is_null($professionistID)) {
            // dd($professionists)
            return view('admin.professionists.index', compact('professionists', 'leadUnread'));

        } else {
            return view('admin.professionists.create', compact('projects', 'technologies', 'professionists', 'leadUnread'));
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProfessionistRequest  $request
     */
    public function store(StoreProfessionistRequest $request)
    {
        $projects = Project::all();
        $technologies = Technology::all();
        $userId = Auth::id();
        $data = $request->validated();
        $slug = Professionist::generateSlug($request->nickname);
        $data['slug'] = $slug;
        $data['user_id'] = $userId;
        if ($request->hasFile('profile_image')) {
            $path = Storage::put('professionist_images', $request->profile_image);
            $data['profile_image'] = $path;
        } else {
            $data['profile_image'] = '';
        }
        if ($request->hasFile('cv_path')) {
            $path = Storage::put('professionist_images', $request->cv_path);
            $data['cv_path'] = $path;
        } else {
            $data['cv_path'] = '';
        }

        $new_professionist = new Professionist;

        $new_professionist->nickname = $data['nickname'];
        $new_professionist->user_id = $data['user_id'];
        $new_professionist->slug = $data['slug'];
        $new_professionist->name = $data['name'];
        $new_professionist->surname = $data['surname'];
        $new_professionist->job_address = $data['job_address'];
        $new_professionist->phone_number = $data['phone_number'];
        $new_professionist->bio = $data['bio'];
        $new_professionist->profile_image = $data['profile_image'];
        $new_professionist->cv_path = $data['cv_path'];
        $new_professionist->linkedin = $data['linkedin'];
        $new_professionist->github = $data['github'];
        $new_professionist->visible = $data['visible'];

        $new_professionist->save();



        if ($request->has('technologies')) {
            // dd($request->technologies);
            $new_professionist->technologies()->attach($request->technologies);
        } else {
            return view('admin.professionists.create', compact('projects', 'technologies'));
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
        $userId = Auth::id();
        $plans = Plan::all();

        $professionistID = Professionist::where('user_id', $userId)->value('id');
        $leads = Lead::where('professionist_id', $professionistID)->get();
        $leadUnread = Lead::where('professionist_id', $professionistID)->where('read', 0)->get();
        if ($professionist->user_id !== Auth::id()) {
            abort(403);
        }
        // dd($token);
        return view('admin.professionists.show', compact('professionist', 'leadUnread', 'plans'));
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
        $userId = Auth::id();
        $professionistID = Professionist::where('user_id', $userId)->value('id');
        $leads = Lead::where('professionist_id', $professionistID)->get();
        $leadUnread = Lead::where('professionist_id', $professionistID)->where('read', 0)->get();
        // if (!Auth::user()->isAdmin() && $professionist->user_id !== Auth::id()) {
        //     abort(403);
        // }
        return view('admin.professionists.edit', compact('professionist', 'projects', 'technologies', 'leadUnread'));
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
        $slug = Professionist::generateSlug($request->nickname);
        $data['slug'] = $slug;
        if ($request->hasFile('profile_image')) {
            if ($professionist->profile_image) {
                Storage::delete($professionist->profile_image);
            }

            $path_img = Storage::put('professionist_images', $request->profile_image);
            $data['profile_image'] = $path_img;
        }
        if ($request->hasFile('cv_path')) {
            if ($professionist->cv_path) {
                Storage::delete($professionist->cv_path);
            }
            $path_cv = Storage::put('professionist_images', $request->cv_path);
            $data['cv_path'] = $path_cv;
        } 



        $professionist->nickname = $data['nickname'];
        // $professionist->user_id = $data['user_id'];
        $professionist->slug = $data['slug'];
        $professionist->name = $data['name'];
        $professionist->surname = $data['surname'];
        $professionist->job_address = $data['job_address'];
        $professionist->phone_number = $data['phone_number'];
        $professionist->bio = $data['bio'];
        if(!isEmpty($request->profile_image)){
            $professionist->profile_image = $data['profile_image'];
        }
        if(!isEmpty($request->cv_path)){
            $professionist->cv_path = $data['cv_path'];
        }
        $professionist->linkedin = $data['linkedin'];
        $professionist->github = $data['github'];
        $professionist->visible = $data['visible'];

        $professionist->update();
        // dd($professionist);
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
