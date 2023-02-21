<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class courses extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'Teacher_id',
        'description',
        'duration',
        'modules',
        'url',
        'image_path',
        'video_path',
        'subject_id',
    ];
}
