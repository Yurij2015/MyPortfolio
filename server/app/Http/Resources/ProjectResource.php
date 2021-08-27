<?php

namespace App\Http\Resources;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'image_preview' => $this->image_preview,
            'project_images' => ProjectImageResource::collection($this->whenLoaded('projectImages'))
        ];

    }
}
