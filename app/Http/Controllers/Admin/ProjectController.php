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
        $projects = Project::where('professionist_id',$userId)->get();

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
        $data = $request->validated();
        $slug = Project::generateSlug($request->name);
        $data['slug'] = $slug;
        $data['professionist_id'] = $userId;
        if ($request->hasFile('cover_image')) {
            $path = Storage::put('project_image', $request->cover_image);
            $data['cover_image'] = $path;
        }
        $newProject = Project::create($data);
        
        return redirect()->route('admin.projects.show', $newProject->slug);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     */
    public function edit(Project $project)
    {
        $technologies = Technology::all();
        return view("admin . projects . edit", compact('project, technologies'));
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
            $data['project_image'] = $path;

        }
        $project->update($data);

        if ($request->has('technologies')) {
            $project->technologies()->sync($request->technologies);
        } else {
            $project->technologies()->sync([]);
        }
        return redirect()->route('admin.projects.index')->with('message', "$project->slug updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index')->with('message', "$project->slug deleted successfully");
    }
}
