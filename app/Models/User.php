<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

abstract class User extends Authenticatable
{
    //ENEN DIKO MAS TOUTO TO MODEL EN DEFAULT APLA AFINW TO
    use HasApiTokens, HasFactory, Notifiable;

    //Opote ena kamw set password, prin na mpei mesto database enna kamei run to function
    //iparxei kai to antistoixo get gia opote kamw access pu to database
    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }

}
