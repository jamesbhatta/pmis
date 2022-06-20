<?php

namespace App\Http\Controllers;

use App\DrinkingWaterOffice;
use Illuminate\Http\Request;

class DrinkingWaterOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DrinkingWaterOffice $drinkingWaterOffice)
    {

        // $drinkingWaterOffices = DrinkingWaterOffice::with('organization')->get();
        return view('DrinkingWaterOffice.create', compact(['drinkingWaterOffice']));
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
     * @param  \App\DrinkingWaterOffice  $drinkingWaterOffice
     * @return \Illuminate\Http\Response
     */
    public function show(DrinkingWaterOffice $drinkingWaterOffice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DrinkingWaterOffice  $drinkingWaterOffice
     * @return \Illuminate\Http\Response
     */
    public function edit(DrinkingWaterOffice $drinkingWaterOffice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DrinkingWaterOffice  $drinkingWaterOffice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DrinkingWaterOffice $drinkingWaterOffice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DrinkingWaterOffice  $drinkingWaterOffice
     * @return \Illuminate\Http\Response
     */
    public function destroy(DrinkingWaterOffice $drinkingWaterOffice)
    {
        //
    }
}
