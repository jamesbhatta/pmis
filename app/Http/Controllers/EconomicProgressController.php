<?php

namespace App\Http\Controllers;

use App\Project;
use App\Rules\NepaliDate;
use Illuminate\Http\Request;

class EconomicProgressController extends Controller
{
    public function show(Project $project)
    {
        $economicProgresses = $project->economicProgresses;

        // if (!$economicProgress) {
        //     $economicProgress = $project->economicProgress()->create();
        // }

        return view('project.economic-progress', [
            'project' => $project,
            'economicProgresses' => $economicProgresses
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => ['required', new NepaliDate],
            'amount' => ['required', 'integer'],
            'remarks' => ['nullable'],
            'is_last_payment' => ['nullable', 'boolean'],
        ]);

        return $request;
    }
}
