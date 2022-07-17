<?php

namespace App\Http\Controllers;

use App\BudgetSource;
use App\FiscalYear;
use App\Organization;
use App\User;
use App\Project;
use App\ProjectType;
use Illuminate\Http\Request;
use App\District;
use App\Municipality;
use App\Ward;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $title = 'Dashboard';

        $onlineFormsCount = 10;
        $registeredOrganizationsCount = 8;
        $closedOrganizationsCount = 2;

        $totalUsersCount = User::count();
        $totalProjectsCount = Project::count();
        $totalOrganizationsCount = Organization::count();
        $totalProjectTypesCount=ProjectType::count();
        $totalBudgetSource=BudgetSource::count();
        $totalFiscalYear=FiscalYear::count();
        $totalDistricts=District::where('province_id','7')->count();
        $totalMuncipality=Municipality::count();
        $totalWards=Ward::count();

        return view('home', [
            'title' => $title,
            'totalProjectsCount' => $totalProjectsCount,
            'totalUsersCount' => $totalUsersCount,
            'totalOrganizationsCount' => $totalOrganizationsCount,
            'totalProjectTypesCount' => $totalProjectTypesCount,
            'onlineFormsCount' => $onlineFormsCount,
            'registeredOrganizationsCount' => $registeredOrganizationsCount,
            'closedOrganizationsCount' => $closedOrganizationsCount,
            'totalBudgetSource' => $totalBudgetSource,
            'totalFiscalYear' => $totalFiscalYear,
            'totalDistrictsCount' => $totalDistricts,
            'totalMuncipalityCount' => $totalMuncipality,
            'totalWardsCount' => $totalWards,
        ]);
    }
}
