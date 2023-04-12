<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'question', 'question_degree', 'exam_id', 'correct_answer_id','school_id','question_photo'
    ];
    protected $casts = [
    'question_degree' => 'integer',
];
}
