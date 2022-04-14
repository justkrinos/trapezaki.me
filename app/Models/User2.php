<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//O user2 einai taggable (eshei tags)
use Cviebrock\EloquentTaggable\Taggable;
use PHPUnit\Framework\MockObject\Verifiable;

class User2 extends Authenticatable implements MustVerifyEmail
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

    public function photos(){
        return $this->hasMany('App\Models\User2_Photo','user2_id','id')->where('photo_path', 'not like', 'logo%');
    }

    public function deletePhotos(){
        foreach($this->photos()->get() as $photo){
            File::delete('assets/images/uploads/' . $photo->photo_path); //delete file
            $photo->delete(); //delete record in database
        }
    }

    public function deleteMenu(){
        File::delete('assets/images/uploads/' . $this->menu); //delete file
    }

    public function logo(){
        return $this->hasMany('App\Models\User2_Photo','user2_id','id')->where('photo_path', 'like', 'logo%')->get()->first()->photo_path;
    }

    public function floorPlan(){
        return $this->hasOne('App\Models\FloorPlan','id','id')->withDefault([
            'json' => null
        ]);
    }

    public function tables(){
        return $this->hasMany('App\Models\Table','user2_id','id');
    }

}
