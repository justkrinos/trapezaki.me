<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User2;
use Illuminate\Support\Facades\Auth;

class RegisterUser2 extends Controller
{
    public function view(){
        if(Auth::check('user2'))
            return redirect('/profile');

        return view('business.signup');
    }



    public function create()
    {

        $attributes = request()->validate([
            'username' => 'required|max:50|min:3|unique:user2s',
            'email' => 'required|max:100|unique:user2s|email',
            'password' => 'required|max:50|min:7',
            //'password_ver' => 'required|max:50|min:7', TODO
            'business_name' => 'required|max:100|min:1',
            'company_name' => 'required|max:100|min:1',
            'representative' =>'required|max:50|min:2',
            'city' => 'required|max:70|min:1',
            'phone' => 'required|min:8',
            'description' =>'nullable',
            'photo' => 'nullable' ,
            'logo' => 'required',
            'location' => 'nullable',
            'type' => 'nullable', //TODO
            'tags' => 'nullable' //TODO
            //genika, menoun ta validations twn pic, checkboxes je tags
        ]);
        //dd("Success validation succeed");

        $user2 = User2::create($attributes);

        //auth()->login($user2);

        //TODO email verification

        return redirect('/')->with('success',"Your account has been created successfully!
             Check your email for verification.");

             //The message is not show, idk why
    }
    
}
