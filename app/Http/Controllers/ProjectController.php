<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Organization;
<<<<<<< HEAD
use App\Project_type_model;
=======
>>>>>>> 13648db5b4f4a4154fc96de48086f250090025fa

class ProjectController extends Controller
{
    public function index(Project $project)
    {
<<<<<<< HEAD
        $ProjectTypes=Project_type_model::all();
        $organizations=Organization::all();
        $projects=Project::with('organization')->get();
        return view("project.index",compact(['organizations','projects','project','ProjectTypes']));
=======
        $organizations = Organization::all();
        $projects = Project::with('organization')->get();
        return view("project.index", compact(['organizations', 'projects', 'project']));
>>>>>>> 13648db5b4f4a4154fc96de48086f250090025fa
    }

    public function create()
    {
        return $this->showForm(new Project());
    }
    
    public function showForm(Project $project)
    {
<<<<<<< HEAD
        return $project;

=======
        return view('project.create', [
            'organizations' => Organization::get(),
        ]);
>>>>>>> 13648db5b4f4a4154fc96de48086f250090025fa
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
