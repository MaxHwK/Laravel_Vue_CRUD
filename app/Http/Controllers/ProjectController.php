<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Client;
use App\Models\Type;
use App\Http\Requests\FormProjectRequest;
use App\Http\Requests\ManageProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Repositories\ProjectRepository;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::with('client','type')->get();
    
        return view('projects.index')   
            ->with('projects', $projects);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param ManageProjectRequest $request
     * @return \Illuminate\Http\Response
     */
    public function create(ManageProjectRequest $request)
    {
        return view('projects.create')
            ->withTypes(Type::all())
            ->withClients(Client::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FormProjectRequest $request, ProjectRepository $projectRepository)
    {
        $projectRepository->create($request->only(
            'numero',
            'nom',
            'description',
            'technologies',
            'client_id',
            'type_id',
            'responsable',
            'date_debut',
            'date_fin_estimee',
            'date_fin_reelle'
        ));
     
        return redirect()->route('projects.index')
            ->with('success','Project has been created successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project, ManageProjectRequest $request)
    {
        return view('projects.edit',compact('project'))
            ->withTypes(Type::all())
            ->withClients(Client::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Project $project, FormProjectRequest $request, ProjectRepository $projectRepository)
    {
        $projectRepository->update($project, $request->only(
            'numero',
            'nom',
            'description',
            'technologies',
            'client_id',
            'type_id',
            'responsable',
            'date_debut',
            'date_fin_estimee',
            'date_fin_reelle'
        ));
    
        return redirect()->route('projects.index')
            ->with('success','Project has been updated successfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, ManageProjectRequest $request)
    {
        $project->delete();

        return response()->json([
            'message'=>'Project deleted successfully !',
            'projects'=> Project::with('client','type')->get()
        ]);
    }
}
