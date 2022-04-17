<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail; //to verify email
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User3 extends Authenticatable implements MustVerifyEmail
{                                       //clearly for email verification
    use HasFactory;
    protected $guard = 'user3';

    //Gia na men exume thema me ta fillable j mass assignments
    protected $guarded = [];

    protected $hidden = [
        'password',
        'password_confirmation'
    ];

    //Opote ena kamw set password, prin na mpei mesto database enna kamei run to function
    //iparxei kai to antistoixo get gia opote kamw access pu to database
    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }

    public function reservations(){
        return $this->hasMany('App\Models\Reservation');
    }
}
