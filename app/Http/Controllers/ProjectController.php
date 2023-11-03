<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$projects=auth()->user()->projects()->get();
        $projects = Project::all();
        return response()->json($projects);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
<<<<<<< HEAD
       // $project = Project::create($request->all());
        //return response()->json($project);

        $validationdata = $request->validate(
=======
               $validationdata = $request->validate(
>>>>>>> 281aea54c4437421a8d20a9bf7257b81cdd3bdcd
            [
               'title' => 'required|max:255',
               'description' => 'required',
               'user_id' => 'required',
            ]
            );
            Project::create($validationdata);

            return redirect('projects')->with('success', 'Project created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return response()->json($project);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $project->update($request->all());
        return response()->json($project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return response()->json($project);
    }
}
