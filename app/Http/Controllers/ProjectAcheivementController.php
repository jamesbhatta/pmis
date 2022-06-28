<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectAcheivementController extends Controller
{
    public function show(Project $project)
    {
        return view('project.acheivements', [
            'project' => $project,
        ]);
    }

    public function update(Request $request, Project $project)
    {
        $request->validate([
            'acheivements' => 'nullable',
        ]);

        $project->update(['acheivements' => $request->acheivements]);

        return redirect()->back()->with('success', 'Data saved successfully');
    }
}
