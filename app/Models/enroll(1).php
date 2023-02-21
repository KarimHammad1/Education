<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enroll extends Model
{
    use HasFactory;
    protected $fillable = [
        'Student_id',
        'course_id',
        'course_image',
        'course_name',
    ];
}
