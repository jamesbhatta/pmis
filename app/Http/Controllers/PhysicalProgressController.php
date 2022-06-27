<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class PhysicalProgressController extends Controller
{
    public function show(Project $project)
    {
        $physicalProgress = $project->physicalProgress;

        if(!$physicalProgress) {
            $physicalProgress = $project->physicalProgress()->create();
        }

        return view('project.physical-progress', [
            'project' => $project,
            'physicalProgress' => $physicalProgress
        ]);
    }

    public function update(Project $project)
    {
    }
}
