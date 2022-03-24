<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User2;
use Illuminate\Support\Facades\Auth;

class RegisterUser2 extends Controller
{
    public function view()
    {
        if (Auth::check('user2'))
            return redirect('/profile');

        return view('business.signup');
    }



    public function create()
    {
        //First only validate
        request()->validate([
            'password' => 'required|max:50|min:7|confirmed',
            'password_confirmation' => 'required', //only check, don't save
        ]);

        //Then save the attributes of the record, because we don't want to include password confirmation
        $attributes = request()->validate(
            [
                'username' => 'required|max:50|min:3|unique:user2s',
                'email' => 'required|max:50|unique:user2s|email',
                'password' => 'required|max:50|min:7',
                'business_name' => 'required|max:50|min:1',
                'company_name' => 'required|max:50|min:1',
                'representative' => 'required|max:50|min:2',
                'city' => 'required|max:30|min:2',
                'postal' => 'required|numeric|max:999999|min:1',
                'address' => 'required|min:2',
                'long' => 'required|numeric',
                'lat'  => 'required|numeric',
                'phone' => 'required|max:13|min:8',
                'description' => 'nullable',
                'photo' => 'nullable',
                'logo' => 'required',
                'location' => 'nullable',
                'type' => 'nullable', //TODO
                'tags' => 'nullable' //TODO
                //genika, menoun ta validations twn pic, checkboxes je tags
            ],
            [
                'postal.numeric' => 'The postal code must be a number.',
                'postal.required' => 'The postal code is required.'
            ]
        );
        //dd("Success validation succeed");

        $user2 = User2::create($attributes);

        //auth()->login($user2);
        //ssession()->flash('success', 'Your account has been created');

        //TODO email verification

        return redirect('/login')->with('success', "Your account has been created successfully!
             Check your email for verification.");

        //The message is shown ugly, idk why
    }
}
