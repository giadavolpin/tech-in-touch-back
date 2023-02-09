<?php

namespace App\Http\Controllers\Admin;

use App\Models\Professionist;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Technology;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $userId = Auth::id();
        $professionistID = Professionist::where('user_id', $userId)->pluck('id');
        $projects = Project::where('professionist_id', $professionistID[0])->get();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $professionists = Professionist::all();
        return view("admin.projects.create", compact('professionists'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     */
    public function store(StoreProjectRequest $request)
    {
        $userId = Auth::id();
        $professionistID = Professionist::where('user_id', $userId)->pluck('id');
        // dd($professionistID);
        $data = $request->validated();
        $slug = Project::generateSlug($request->name);
        $data['slug'] = $slug;
        $data['professionist_id'] = $professionistID[0];
        if ($request->hasFile('cover_image')) {
            $path = Storage::put('project_image', $request->cover_image);
            $data['cover_image'] = $path;
        }
        $newProject = Project::create($data);

        return redirect()->route('admin.projects.index', $newProject->slug)->with('message', "$newProject->slug è stato creato con successo");
        ;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     */
    public function show(Project $project)
    {
        $userId = Auth::id();
        $professionistID = Professionist::where('user_id', $userId)->pluck('user_id');
        $id = Auth::id();
        // dd($project->professionist_id == Auth::id() );
        // dd($id);
        // dd($project->professionist_id);
        // dd($project->professionist_id == $id);

        return view('admin.projects.show', compact('project'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     */
    public function edit(Project $project)
    {
        return view("admin.projects.edit", compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {

        $data = $request->validated();
        $slug = Project::generateSlug($request->name);
        $data['slug'] = $slug;
        if ($request->hasFile('cover_image')) {
            if ($project->cover_image) {
                Storage::delete($project->cover_image);
            }
            $path = Storage::put('project_image', $request->cover_image);
            $data['cover_image'] = $path;

        }
        $project->update($data);


        return redirect()->route('admin.projects.index')->with('message', "$project->slug è stato caricato con successo");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     */
    public function destroy(Project $project)
    {
        if ($project->cover_image) {
            Storage::delete($project->cover_image);
        }
        $project->delete();

        return redirect()->route('admin.projects.index')->with('message', "$project->slug è stato cancellato correttamente");
    }
}