<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cancellation extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function reservation(){
        return $this->belongsTo('App\Models\Reservation');
    }
}
