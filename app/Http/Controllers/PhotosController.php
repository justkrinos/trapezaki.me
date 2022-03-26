<?php

namespace App\Http\Controllers;

use App\Models\User2_Photo;
use App\Models\User1;
use App\Models\Tag;
use Image;

use Illuminate\Http\Request;

class PhotosController extends Controller
{

    public function store_resize(Request $request)
    {

        //validate the image
        $validatedData = $request->validate([
            'logo' => 'required|image|mimes:jpg,png,jpeg,svg|max:2048',

        ]);

        //rename the image
        $imageName = time() . uniqid() . '.' . $request->logo->extension();



        $destinationPath = public_path('assets/images/uploads/');
        $img = Image::make($request->file('logo')->path());


        //Resize it and save it as a thumbnail
        $img->resize(100, 100, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . 'thumbnails/' . $imageName);


        //save in the public folder as a normal scaled image
        $request->logo->move($destinationPath, $imageName);
    }


        //Documentation And Resources:
        //https://github.com/cviebrock/eloquent-taggable
        //https://www.youtube.com/watch?v=uMnCcEVPZaM
        //https://www.youtube.com/watch?v=o-uE5_4WFq8


}
