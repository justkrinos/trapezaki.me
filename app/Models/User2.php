<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User2 extends Model
{
    use HasFactory;

    protected $guard = 'user2';

    //Can mass assignment-fillables
    protected $guarded = [];

    protected $hidden = [
        'password',
        'password_confirmation'
    ];

    //bcrypt = password encryption function
    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }
}
