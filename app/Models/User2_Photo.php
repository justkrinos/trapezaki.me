<?php

namespace App\Models;

// use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User2_Photo extends Model
{
    use HasFactory;
    protected $table = 'user2_photos';
    protected $guarded = [];

    //A function used to store multiple images
    public static function store_multiple(array $photos, int $userid){
        //for each photo
        $count = 1; //gia na allassei to ID pu pintonete pasto photo name
        //epd en mpenni apefthias mesto db
        foreach ($photos as $image) {
            //rename the image and make sure it has a unique name
            $imageName = time() . strval(User2_Photo::max('id') + strval($count)) . uniqid() . '.' . $image->extension();

            //save in the public folder
            $image->move(public_path('assets/images/uploads'), $imageName);
            $count++;

            //Create the record in the table
            User2_Photo::create(['user2_id' => $userid,'photo_path'=> $imageName]);
        }
    }

    public static function store_logo(UploadedFile $photo, int $userid){
        //rename the image
        $imageName = 'logo_' . strval($userid) . '.' . $photo->extension();

        //save in the public folder
        $photo->move(public_path('assets/images/uploads'), $imageName);

        //Create the record in the table
        User2_Photo::create(['user2_id' => $userid,'photo_path'=> $imageName]);
    }

    public static function update_logo(UploadedFile $photo, int $userid){
        //rename the image
        $imageName = 'logo_' . strval($userid) . '.' . $photo->extension();

        //save in the public folder
        $photo->move(public_path('assets/images/uploads'), $imageName);

        //Update the record in the table
        User2_Photo::where('user2_id',$userid)
            ->where('photo_path', 'like', 'logo%')
            ->update(['photo_path'=> $imageName]);
    }

    public static function store_one(UploadedFile $photo, int $userid){
        $imageName = time() . strval(User2_Photo::max('id') + 1) . uniqid() . '.' . $photo->extension();

        $photo->move(public_path('assets/images/uploads'), $imageName);

        User2_Photo::create(['user2_id' => $userid,'photo_path'=> $imageName]);
    }


    public function user2(){
        return $this->belongsTo('App\Models\User2');
    }

}
