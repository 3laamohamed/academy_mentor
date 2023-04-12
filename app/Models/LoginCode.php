<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginCode extends Model
{
    use HasFactory;
        protected $fillable = [
        'code', 'used','school_id','expiry_date'
    ];
   public function getUsedAttribute($value){
    if($value==0){
        return 'not used';
    }else{
        return 'used';
    }
   }
}
