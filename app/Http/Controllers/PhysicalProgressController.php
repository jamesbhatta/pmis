<?php

namespace App\Http\Controllers;

use App\Project;
use App\Rules\NepaliDate;
use Illuminate\Http\Request;

class PhysicalProgressController extends Controller
{
    public function show(Project $project)
    {
        $physicalProgress = $project->physicalProgress;

        if (!$physicalProgress) {
            $physicalProgress = $project->physicalProgress()->create();
        }

        return view('project.physical-progress', [
            'project' => $project,
            'physicalProgress' => $physicalProgress
        ]);
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'estimate_completed' => ['nullable', 'boolean'],
            'agreement_date' => ['required', new NepaliDate],
            'project_start_date' => ['nullable', new NepaliDate],
            'project_completion_date' => ['nullable', new NepaliDate],
            'tender_date' => ['nullable', new NepaliDate],
            'wip' => ['nullable', 'boolean'],
            'followed_up' => ['nullable', 'boolean']
        ]);

        // return $data;

        $project->physicalProgress()->update($data);

        return response()->json([
            'status' => 200,
            'message' => 'Data has been saved'
        ], 200);
    }
}
