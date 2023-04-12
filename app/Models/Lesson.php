<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'class_id', 'school_id', 'session_id','subject_id','section_id','thumbnail'
    ];
}
 