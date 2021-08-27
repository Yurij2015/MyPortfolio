<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectCollection;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Support\Facades\Validator;
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
        return response()->json(new ProjectCollection(Project::with('projectImages')->get()), Response::HTTP_OK);
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

    public function fileStore(Request $request)
    {
        $validator = Validator:: make($request->all(), [
            'image_preview' => 'required|mimes:jpg,png,jpeg|max:5000',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        if ($files = $request->file('image_preview')) {
            $upload_path = public_path('/images');
            $file_name = $request->image_preview->getClientOriginalName();
            $request->image_preview->move($upload_path, $file_name);
            return response()->json([
                "success" => true,
                "message" => "Файл успішно завантажено",
                "file" => $file_name,
                "url" => "http://localhost:8000/images/" . $file_name,
            ]);
        }
        return response()->json(["message" => "Помилка"]);
    }
}
