<?php

namespace App\Http\Controllers\Admin;

use App\Models\Professionist;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Technology;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Models\Lead;



class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(Request $request)
    {
        $userId = Auth::id();

        $professionistID = Professionist::where('user_id', $userId)->value('id');
        // dd($professionistID);

        // dd($session_id);
        $leads = Lead::where('professionist_id', $professionistID)->get();
        // dd($leads);

        $leadUnread = Lead::where('professionist_id', $professionistID)->where('read', 0)->get();

            $projects = Project::where('professionist_id', $professionistID )->get();
            // dd($projects);

        // $projects = Project::where('professionist_id', $professionistID)->get();

        return view('admin.projects.index', compact('projects','professionistID','leadUnread'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $userId = Auth::id();

        $professionists = Professionist::all();
        $professionistID = Professionist::where('user_id', $userId)->value('id');
        $leads = Lead::where('professionist_id', $professionistID)->get();
       $leadUnread = Lead::where('professionist_id', $professionistID)->where('read', 0)->get();
        return view("admin.projects.create", compact('professionists','leadUnread'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     */
    public function store(StoreProjectRequest $request)
    {
        $userId = Auth::id();
        $professionistID = Professionist::where('user_id', $userId)->value('id');
        $professionistNick = Professionist::where('user_id', $userId)->value('nickname');
        $data = $request->validated();
        $slug = Project::generateSlug($request->name, $professionistNick);
        $data['slug'] = $slug;
        $data['professionist_id'] = $professionistID;

        if ($request->hasFile('cover_image')) {
            $path = Storage::put('project_image', $request->cover_image);
            $data['cover_image'] = $path;
        }
        $newProject = Project::create($data);
        // dd($newProject);
        //mattia ti prego;


        return redirect()->route('admin.projects.index', $newProject->slug)->with('message', "$newProject->slug ?? stato creato con successo");
        ;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     */
    public function show(Project $project)
    {
        //controllo
        $userId = Auth::id();
        Session::flash('userId',  $userId);
        $professionistID = Professionist::where('user_id', $userId)->value('id');
        $leads = Lead::where('professionist_id', $professionistID)->get();
       $leadUnread = Lead::where('professionist_id', $professionistID)->where('read', 0)->get();
        $professionistID = Professionist::where('user_id', $userId)->value('id');

        $session_id = Session::get('userId');
        // dd($session_id);

        if($project->professionist_id == $professionistID  && $userId == $session_id){
            return view('admin.projects.show', compact('project','leadUnread'));
        }else{
            abort(404);
        }


        // dd($project->professionist_id == Auth::id() );
        // dd($id);
        // dd($project->professionist_id);
        // dd($project->professionist_id == $id);

        // return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     */
    public function edit(Project $project)
    {
        $userId = Auth::id();

        $professionistID = Professionist::where('user_id', $userId)->value('id');
        $leads = Lead::where('professionist_id', $professionistID)->get();
       $leadUnread = Lead::where('professionist_id', $professionistID)->where('read', 0)->get();
        return view("admin.projects.edit", compact('project','leadUnread'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $userId = Auth::id();
        $data = $request->validated();
        $professionistNick = Professionist::where('user_id', $userId)->value('nickname');
        $slug = Project::generateSlug($request->name, $professionistNick);
        $data['slug'] = $slug;
        if ($request->hasFile('cover_image')) {
            if ($project->cover_image) {
                Storage::delete($project->cover_image);
            }
            $path = Storage::put('project_image', $request->cover_image);
            $data['cover_image'] = $path;

        }
        $project->update($data);
        //dd($project);

        return redirect()->route('admin.projects.index')->with('message', "$project->slug ?? stato caricato con successo");
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

        return redirect()->route('admin.projects.index')->with('message', "$project->slug ?? stato cancellato correttamente");
    }
}
