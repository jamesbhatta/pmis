<?php

namespace App\Http\Controllers;

use App\ProjectTopic;
use App\ProjectType;
use Illuminate\Http\Request;

class ProjectTypeController extends Controller
{
    public function index($projectType = null)
    {
        $projectTypes = ProjectType::with('topic')->get();
        $projectTypesGrouped = $projectTypes->groupBy('topic.title');
        $topics = ProjectTopic::get();

        if (!$projectType) {
            $projectType = new ProjectType();
        }

        return view('project-type.index', compact(['projectTypesGrouped', 'projectType', 'topics']));
    }

    public function store(Request $request)
    {
        ProjectType::create($request->validate([
            'name' => 'required',
            'name_en' => 'nullable',
            'topic_id' => 'required'
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
            'name_en' => 'nullable',
            'topic_id' => 'required'
        ]));

        return back()->with('success', 'Project type updated.');
    }

    public function destroy(ProjectType  $projectType)
    {
        if ($projectType->projects()->count()) {
            return redirect()->route('project-type.index')->with('error', 'Sorry you cannot delete this project type.');
        }

        $projectType->delete();

        return redirect()->route('project-type.index')->with('success', 'परियोजनाको प्रकार मेटाइएको छ।');
    }
}
