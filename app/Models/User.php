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
}
