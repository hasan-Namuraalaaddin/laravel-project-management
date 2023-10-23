<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Tag::all();
        return response()->json($projects);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $project = Tag::create($request->all());
        return response()->json($project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return response()->json($tag);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        $tag->update($request->all());
        return response()->json($tag);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return response()->json($tag);
    }
}
