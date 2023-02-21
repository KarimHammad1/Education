<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'Teacher_id',
        'course_id',
        'Quiz_1',
        'Quiz_2',
        'Quiz_3',
    ];
}
