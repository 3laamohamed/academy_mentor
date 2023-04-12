<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSolvedExam extends Model
{
    use HasFactory;
        protected $fillable = [
        'exam_id', 'user_id','school_id', 'exam_degree',
    ];

    public function answers(){
        return $this->hasMany(StudentAnswers::class,'answer_id','id');
    }
}
