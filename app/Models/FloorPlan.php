<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FloorPlan extends Model
{
    use HasFactory;

    function user2(){
        return $this->belongsTo('App\Models\User2','user2_id','user2_id');
    }
}
