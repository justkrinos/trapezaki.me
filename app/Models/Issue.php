<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent;
use Illuminate\Database\Eloquent\Model;

use IssuesU1Controller;

class Issue extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user2(){
        return $this->belongsTo('App\Models\User2');
    }

}
