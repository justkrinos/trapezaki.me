<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User1 extends User
{
    use HasFactory, Notifiable;

    protected $guarded = [];

    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }
}
