<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IosAppConfig extends Model
{
    use HasFactory;
            protected $fillable=[
        'minimum_version','url','school_id','maintenance_mode'
        ];
}
