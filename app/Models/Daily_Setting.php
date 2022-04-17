<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daily_Setting extends Model
{
    public $table = 'daily_settings';

    use HasFactory;
    protected $guarded = [];

    public function user2(){
        return $this->belongsTo('App\Models\User2');
    }
}
