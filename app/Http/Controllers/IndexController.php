<?php

namespace App\Http\Controllers;

use App\Organization;
use Illuminate\Http\Request;
use App\Project ;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    public function physicalInfrastructure($id)
    {
        // $physical_infrastures = Project::get();
        $offices=Organization::withCount('project')->get();
        
        return view('organization-list.physical-infrastructure.index',compact('offices'));
    }
    public function waterResources()
    {
        return view('organization-list.water-resources.index');
    }
    public function waterAndSanitation()
    {
        return view('organization-list.water-and-sanitation.index');
    }
    public function pathraiyaMohanIrrigation()
    {
        return view('organization-list.pathraiya-mohana-irrigation.index');
    }

    public function urbanDevelopmentandBuildingConstruction(){
        return view('organization-list.urban-development-and-building-construction.index');
    }

    public function transportManagementOffice(){
        return view('organization-list.transport-management-office.index');
    }
    public function viewDetails(){
        return view('organization-list.physical-infrastructure.Details');
    }
    public function allProjects(){
        return view('organization-list.physical-infrastructure.allprojects');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
