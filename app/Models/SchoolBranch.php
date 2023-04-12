<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolBranch extends Model
{
    use HasFactory;
        protected $fillable = [
        'name', 'email', 'phone', 'address','school_id'
    ];
    protected $casts = [
    'id' => 'integer',
];
}
