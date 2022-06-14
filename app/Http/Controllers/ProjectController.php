<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Organization;

class ProjectController extends Controller
{
    public function index(Project $project)
    {
        $organizations = Organization::all();
        $projects = Project::with('organization')->get();
        return view("project.index", compact(['organizations', 'projects', 'project']));
    }

    public function create()
    {
        return $this->showForm(new Project());
    }
    
    public function showForm(Project $project)
    {
        return view('project.create', [
            'organizations' => Organization::get(),
        ]);
    }
    
    public function store(Request $request)
    {
        Project::create($request->validate([
            'title' => 'required',
            'organization_id' => 'required',
            'project_type' => 'required',
            'budget' => 'required',
            'budget_source' => 'required',
            'description' => 'required',
        ]));

        return redirect()->back()->with('success', 'Record has been added');
    }
   
    public function edit(Project $project)
    {
        $organizations = Organization::all();
        $projects = Project::with('organization')->get();
        return view("project.index", compact(['organizations', 'projects', 'project']));
    }
   
    public function update(Request $request, Project $project)
    {
        $project->update($request->validate([
            'title' => 'required',
            'organization_id' => 'required',
            'project_type' => 'required',
            'budget' => 'nullable',
            'budget_source' => 'nullable',
            'description' => 'nullable',
        ]));

        return redirect()->route('project.index')->with('Success', "Update Success");
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->back()->with('success', 'Record has been removed');
    }
}
