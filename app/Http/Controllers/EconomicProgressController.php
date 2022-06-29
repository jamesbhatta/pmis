<?php

namespace App\Http\Controllers;

use App\Project;
use App\Rules\NepaliDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function store(Request $request, Project $project)
    {
        $data = $request->validate([
            'date' => ['required', new NepaliDate],
            'amount' => ['required', 'integer'],
            'remarks' => ['nullable'],
            'is_last_payment' => ['nullable', 'boolean'],
        ]);

        try {
            DB::beginTransaction();
            $totalAmount = $project->budget;
            $paidAmount = $project->economicProgresses()->sum('amount') + $data['amount'];
            $data['progress_percent'] = ($paidAmount / $totalAmount) * 100;
            $project->update([
                'economic_progress_percent' => $data['progress_percent']
            ]);
            $project->economicProgresses()->create($data);
            return response()->json([
                'status' => 200,
                'message' => 'Payment saved.'
            ], 200);
            DB::commit();
        } catch (\Throwable $th) {
            report($th);
            DB::rollBack();
            return response()->json([
                'status' => 500,
                'message' => 'OOPS!! something went wrong.'
            ], 500);
        }
    }
}
