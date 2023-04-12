<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'exam_type','is_exercise','starting_time', 'ending_time', 'total_marks', 'status', 'class_id', 'subject_id', 'school_id', 'session_id','class_room_ids','duration','category_id'
    ];
        protected $casts = [
    'duration' => 'integer',
    'class_room_ids'=>'array'
];
}
