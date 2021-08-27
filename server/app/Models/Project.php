<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'image_preview'];
    protected $quarded;

    public function projectImages()
    {
        return $this->hasMany(ProjectImage::class);
    }

}
