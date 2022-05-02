<?php

namespace App\Http\Controllers;

use App\Models\User2_Photo;
use Illuminate\Support\Facades\Auth;
use App\Models\User2;
use App\Models\User1;
use App\Models\Tag;
use Image;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class PhotosController extends Controller
{
    public function show(){
        $request = request()->validate(['user_id' => 'required|numeric|min:0']);
        return User2::find($request['user_id'])->photos;
    }

    public function modify()
    {
        $request = request()->validate([
            'action' => 'required|in:delete,modify',
            'user_id' => 'required|numeric'
        ]);

        $user2 = Auth::guard('user2')->user();
        if(!$user2 && Auth::check('user1')){
            $user2 = User2::find($request['user_id']);
        }


        if(strcmp($request['action'],'delete')==0){

            $request =  request()->validate([
                'photo_path' => 'required'
            ]);


            $photo_path = $request['photo_path'];

            //Can't delete last photo
            if($user2->photos->count() == 1){ //because logos do not count in the relationship $user2->photos
                return false;
            }
            else{
                $deleted = $user2->photos->where('photo_path', $photo_path)->first()->delete(); //delete record in db
                File::delete('assets/images/uploads/' . $photo_path); //delete file
                return 'success';
            }

        }

        else if(strcmp($request['action'],'modify')==0){
            $request = request()->validate([
                'photo' => 'required|image|mimes:jpg,png,jpeg,svg|max:2048'
            ]);

            //TODO: tuta en ta valame sta eggrafa (sxediasmou parapanw j prodiagrafon ta megala diagrammata)
            User2_Photo::store_one(request()->file('photo'),$user2->id);

            return ['success'];
        }

    }

    //THIS IS FOR FUTURE USE
    // public function store_resize(Request $request)
    // {

    //     //validate the image
    //     $validatedData = $request->validate([
    //         'logo' => 'required|image|mimes:jpg,png,jpeg,svg|max:2048',

    //     ]);

    //     //rename the image
    //     $imageName = time() . uniqid() . '.' . $request->logo->extension();



    //     $destinationPath = public_path('assets/images/uploads/');
    //     $img = Image::make($request->file('logo')->path());


    //     //Resize it and save it as a thumbnail
    //     $img->resize(100, 100, function ($constraint) {
    //         $constraint->aspectRatio();
    //     })->save($destinationPath . 'thumbnails/' . $imageName);


    //     //save in the public folder as a normal scaled image
    //     $request->logo->move($destinationPath, $imageName);
    // }


        //Documentation And Resources:
        //https://github.com/cviebrock/eloquent-taggable
        //https://www.youtube.com/watch?v=uMnCcEVPZaM
        //https://www.youtube.com/watch?v=o-uE5_4WFq8


}
