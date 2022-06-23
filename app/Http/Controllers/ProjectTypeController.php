<?php

namespace App\Http\Controllers;

use App\ProjectType;
use Illuminate\Http\Request;

class ProjectTypeController extends Controller
{
    public function index($projectType = null)
    {
        $projectTypes = ProjectType::get();

        if(!$projectType) {
            $projectType = new ProjectType();
        }

        return view('project-type.index', compact(['projectTypes', 'projectType']));
    }

    public function store(Request $request)
    {
        ProjectType::create($request->validate([
            'name' => 'required',
            'name_en' => 'nullable',
        ]));

        return back()->with('success', 'Project Type added');
    }

    public function edit(ProjectType $projectType)
    {
        return $this->index($projectType);
    }

    public function update(Request $request, ProjectType $projectType)
    {
        $projectType->update($request->validate([
            'name' => 'required',
            'name_en' => 'nullable'
        ]));

        return back()->with('success', 'Project type updated.');
    }

    public function destroy(ProjectType  $projectType)
    {
        $projectType->delete();

        return redirect()->route('project-type.index')->with('success', 'Project type deleted successfully.');
    }
}
