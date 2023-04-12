<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $fillable=[
        'answer','correct','school_id','question_id'
    ];
         public function getCorrectAttribute()
    {
        if($this->attributes['correct']==1)
        {
            return true; 
         }
        else{
            return false;
        }  
    }
}
