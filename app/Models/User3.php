<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail; //to verify email
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User3 extends User implements MustVerifyEmail
{                                       //clearly for email verification
    use HasFactory;
    protected $guard = 'user3';

    //Gia na men exume thema me ta fillable j mass assignments
    protected $guarded = [];

    protected $hidden = [
        'password',
        'password_confirmation'
    ];

    public function reservations(){
        return $this->hasMany('App\Models\Reservation');
    }
}
