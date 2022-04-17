<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function user2(){
        return $this->belongsTo('App\Models\User2');
    }

    public function reservations(){
        return $this->hasMany('App\Models\Reservtion');
    }
}
