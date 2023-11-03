<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $projects = User::all();
        return response()->json($projects);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       // $project = Project::create($request->all());
        //return response()->json($project);

        $validationdata = $request->validate(
            [
               'name' => 'required|max:255',
               'email' => 'required',
               'password' => 'required',
            ]
            );
            User::create($validationdata);

            return redirect('users')->with('success', 'Project created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $project)
    {
        return response()->json($project);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $project)
    {
        $project->update($request->all());
        return response()->json($project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $project)
    {
        $project->delete();
        return response()->json($project);
    }
}
