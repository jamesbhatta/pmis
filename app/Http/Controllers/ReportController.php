<?php

namespace App\Http\Controllers;

use App\Organization;
use App\Project;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('report.index');
    }

    public function indicatorReport()
    {
        $projects = Project::with(['projectType', 'physicalProgress', 'economicProgresses'])
            ->get();

        $report = $projects->groupBy('projectType.name');
        return view('report.indicator', [
            'report' => $report
        ]);
    }

    public function progressReport()
    {
        return view('report.progress', [
            'report' => null
        ]);
    }
}
