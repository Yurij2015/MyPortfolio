<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectCollection;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
//        return ProjectResource::collection(Project::all());
        return response()->json(new ProjectCollection(Project::all()), Response::HTTP_OK);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return ProjectResource
     */
    public function store(Request $request)
    {
        $project = Project::create($request->only([
            'title', 'description', 'image_preview'
        ]));
        return new ProjectResource($project);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Project $project
     * @return ProjectResource
     */
    public function show(Project $project)
    {
        return new ProjectResource($project);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Project $project
     * @return ProjectResource
     */
    public function update(Request $request, Project $project)
    {
        $project->update($request->only([
            'title', 'description', 'image_preview'
        ]));
        return new ProjectResource($project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Project $project
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
