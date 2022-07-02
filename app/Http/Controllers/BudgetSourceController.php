<?php

namespace App\Http\Controllers;
use App\BudgetSource;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Http\Request;

class BudgetSourceController extends Controller
{
    public function index(BudgetSource $budgetSource){
        $budgetSources = BudgetSource::all();
        // return $budgetSources;
        return view('budget_source.index',compact('budgetSources','budgetSource'));

    }
    public function edit(BudgetSource $budgetSource){
        $budgetSources = BudgetSource::all();
        // return $budgetSources;
        return view('budget_source.index',compact('budgetSources','budgetSource'));

    }
    // public function create(){
    //     return "hello";
    //     // return view('budget_source.index');
    // }
    public function store(Request $request){
        $budgetSource = BudgetSource::create($request->validate([
            'title' => 'required',

        ]));
        return redirect()->route('budget-source.index')->with('success','Budget Source created successfully');
    }

    public function destroy(BudgetSource $budgetSource)
    {
        $budgetSource->delete();
        return redirect()->back()->with('success',"Budget Source deleted successfully");
    }

    public function update(Request $request, BudgetSource $budgetSource)
    {
        $budgetSource->update($request->validate([
            'title' => 'required',

        ]));
        return redirect()->route('budget-source.index')->with('success','Budget Source updated successfully');
    }
}
