<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectImageCollection;
use App\Http\Resources\ProjectImageResource;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return ProjectImageCollection
     */
    public function index()
    {
        return new ProjectImageCollection(ProjectImage::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param ProjectImage $projectImage
     * @return ProjectImageResource
     */
    public function show(ProjectImage $projectImage)
    {
        return new ProjectImageResource($projectImage);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param ProjectImage $projectImage
     * @return Response
     */
    public function update(Request $request, ProjectImage $projectImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ProjectImage $projectImage
     * @return Response
     */
    public function destroy(ProjectImage $projectImage)
    {
        //
    }
}
