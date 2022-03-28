<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//O user2 einai taggable (eshei tags)
use Cviebrock\EloquentTaggable\Taggable;

class User2 extends Authenticatable
{
    // O user2 eshei tags (has-a relationship)
    use Taggable;
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

    //for the relationship
    public function getTagsRelation(){
        return $this->hasMany(related: 'App\User2_Tag', foreignKey:'taggable_id', localKey:'id');
    }
}
