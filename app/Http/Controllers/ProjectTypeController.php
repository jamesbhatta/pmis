<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project_type_model;
use App\Http\Controllers\Gate;
use App\Http\Controllers\ProjectType;
use ProjectType as GlobalProjectType;

class ProjectTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Project_type_model $projectType)
    {
        $ProjectType=Project_type_model::all();
        return view('project-type.index', compact(['ProjectType','projectType']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Project_type_model::create($request ->validate([
            'project_type'=>'required',
            'project_type_en'=>'nullable'
        ]

        ));
        return redirect()->back()->with('success','Successfully Saved');
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
    public function edit(Project_type_model $projectType)
    {
        $ProjectType=Project_type_model::all();
        return view('project-type.index', compact(['ProjectType','projectType']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Project_type_model $projectType)
    {
        $data=$request ->validate([
            'project_type'=>'required',
            'project_type_en'=>'nullable'
        ]
        );
        $projectType->update($data);
        return redirect()->back()->with('success','Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project_type_model $ProjectType)
    {

        $ProjectType->delete();
        return redirect()->route('project-type.index')->with('success', 'Project Type  has been deleted');

    }
}
