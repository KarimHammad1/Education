<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;
    protected $fillable = [
        'Teacher_id',
        'Student_id',
        'Course_id',
        'email',
        'Score',
        'Quiz_num',
    ];
}

