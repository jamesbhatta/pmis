<?php

namespace App\Http\Controllers;

use App\photo;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectPhotoController extends Controller
{
    public function show(Project $project)
    {
        // return $project;
        $photo=photo::where('project_id',$project->id)->get();
        return view('project.photos', [
            'project' => $project,'photo',
        ]);
    }

    public function update(Request $request, Project $project)
    {

        // return $project->id;


        if ($request->hasfile('image')) {
            foreach ($request->image as $item) {
                // if ($request->hasFile('document')) {
                $datas['image'] = $item->store('uploads');
                // }
                // return $datas;

                photo::create([
                    'project_id' => $project->id,
                    'image' => $datas['image'],
                ]);
            }
        }


        // photo::create($request->validate([
        //     'project_id',
        //     'image',
        // ]));

        // $request->validate([
        //     'photo_before_work' => 'nullable',
        //     'photo_during_evaluation' => 'nullable',
        //     'photo_after_work' => 'nullable',
        // ]);

        // if ($request->hasFile('photo_before_work')) {
        //     Storage::delete($project->photo_before_work);
        //     $project->photo_before_work = $request->file('photo_before_work')->store('uploads');
        // }

        // if ($request->hasFile('photo_during_evaluation')) {
        //     Storage::delete($project->photo_during_evaluation);
        //     $project->photo_during_evaluation = $request->file('photo_during_evaluation')->store('uploads');
        // }

        // if ($request->hasFile('photo_after_work')) {
        //     Storage::delete($project->photo_after_work);
        //     $project->photo_after_work = $request->file('photo_after_work')->store('uploads');
        // }
        
        // $project->save();

        return redirect()->back()->with('success', 'Photo saved successfully');
    }

}
