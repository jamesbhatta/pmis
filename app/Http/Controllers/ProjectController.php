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
        $projects = Project::with('organization')->get();
        $organizations = Organization::get();
        $projectTypes = ProjectType::with('topic')->get()->groupBy('topic.title');

        return view("project.index", compact(['projects', 'project', 'organizations', 'projectTypes']));
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

        return response()->json([
            'status' => 200,
            'message' => 'Project has been created.'
        ], 200);
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

        return response()->json([
            'status' => 200,
            'message' => 'Changes have been saved.'
        ], 200);
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->back()->with('success', 'Record has been removed');
    }
}
