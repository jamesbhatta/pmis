<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Organization;
use App\ProjectType;

class ProjectController extends Controller
{
    public function index(Project $project)
    {
        $organizations = Organization::all();
        $projects = Project::with('organization')->get();
        $projectType=ProjectType::all();

        return view("project.index", compact(['organizations', 'projects', 'project','projectType']));
    }

    public function create()
    {
        return $this->showForm(new Project());
    }

    public function showForm(Project $project)
    {
        $projectTypes = ProjectType::get();
        return view('project.create', [
            'project' => $project,
            'organizations' => Organization::get(),
            'projectTypes' => $projectTypes
        ]);
    }

    public function store(Request $request)
    {
        Project::create($request->validate([
            'title' => 'required',
            'organization_id' => ['required', 'exists:organizations,id'],
            'project_type_id' => ['required', 'exists:project_types,id'],
            'budget' => ['required', 'integer'],
            'budget_source' => ['required'],
            'expenditure_type' => ['required'],
            'last_year_expenditure' => ['nullable', 'integer'],
            'last_year_physical_progress' => ['nullable', 'integer'],
            'last_year_physical_progress' => ['nullable', 'integer'],
            'population_to_be_benefited' => ['nullable'],
            'description' => ['nullable'],
        ]));

        return redirect()->back()->with('success', 'Record has been added');
    }

    public function show(Project $project)
    {
        return view('project.show', [
            'project' => $project
        ]);
    }

    public function edit(Project $project)
    {
        return $this->showForm($project);
    }

    public function update(Request $request, Project $project)
    {
        $project->update($request->validate([
            'title' => 'required',
            'organization_id' => ['required', 'exists:organizations,id'],
            'project_type_id' => ['required', 'exists:project_types,id'],
            'budget' => ['required', 'integer'],
            'budget_source' => ['required'],
            'expenditure_type' => ['required'],
            'last_year_expenditure' => ['nullable', 'integer'],
            'last_year_physical_progress' => ['nullable', 'integer'],
            'last_year_physical_progress' => ['nullable', 'integer'],
            'population_to_be_benefited' => ['nullable'],
            'description' => ['nullable'],
        ]));

        return redirect()->route('project.index')->with('Success', "Update Success");
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->back()->with('success', 'Record has been removed');
    }
}
