<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProjectImageCollection;
use App\Http\Resources\ProjectImageResource;
use App\Models\ProjectImage;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

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
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator:: make($request->all(), [
            'project_id' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5000',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        if ($request->file('image')) {
            $upload_path = public_path('/images');
            $file_name = $request->image->getClientOriginalName();
            $request->image->move($upload_path, $file_name);
             $imagesave = new ProjectImage();
             $url = "http://localhost:8000/images/" . $file_name;
             $imagesave->image = $url;
             $imagesave->project_id = $request->project_id;
             $imagesave->save();
            return response()->json([
                "success" => true,
                "message" => "Файл успішно завантажено",
                "url" => $url,
            ]);
        }
        return response()->json(["message" => "Помилка завантаження файлу"]);
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
     */
    public function update(Request $request, ProjectImage $projectImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ProjectImage $projectImage
     * @return JsonResponse
     */
    public function destroy(ProjectImage $projectImage)
    {
        $projectImage->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
