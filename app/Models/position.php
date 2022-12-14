<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class position extends Model
{
    use HasFactory;
    function roles(){
        return $this->belongsToMany(Role::class,'role_position','position_id','role_id','id');
    }
}
