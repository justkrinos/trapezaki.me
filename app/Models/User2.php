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

    public function dailySettings(){
        return $this->hasMany('App\Models\Daily_Setting');
    }

    public function getDueDateAttribute($value) {
        return $value->format('Y-m-d');
    }

    //Todo: na to grapsume tuto se kathe eggrafo j ulla gia ta models
    public static function convertType(array $validatedData){
        //Kamni ta tis morfis coffee:food:drinks gia osa iparxun
        //etsi wste na borume na ta kamume extract later

        $stringToMake = ""; //to string pu ena stilume pisw
        $dataToChange = ['coffee','food','drinks']; //jina p ena checkarume



        foreach ($dataToChange as $type) { //gia kathe ena p jina p ena checkarume
            if (array_key_exists($type,$validatedData)){ //an iparxi
                if (empty($stringToMake))
                    $stringToMake .= $type; //men tu valis : an akoma en ofkero
                else
                    $stringToMake .= ':' . $type; //vartu : afu empike idi ena mesto array
            }
            //diagrafw ta data pu mesa gt thelw mono to (type => food:coffee klp)
            unset($validatedData[$type]);
        }

        //vallw tu to string p ekama p en ulla mesa
        $validatedData['type'] = $stringToMake;

        //diw to pisw sto function pu to kalese
        return $validatedData;
    }

}
