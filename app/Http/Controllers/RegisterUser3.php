<?php

namespace App\Http\Controllers;

use App\Models\User3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

//A class to make the registration of user3
class RegisterUser3 extends Controller
{
    //private $guest;

    public function view(){
        if(Auth::check('user3'))
            return redirect('/make-a-reservation');

        return view('www.signup');
    }

    public function create(){


        //Ta validation rules iparxun sto documentation tis laravel
        //An den einai success to validation, en tha proxorisi, enna kami redirect stin idia page me ta errors
        //Ta errors ginunte catch pu to blade view

        //extra validation for the password confirmation
        request()->validate([
            'password' => 'required|max:50|min:7|confirmed',
            'password_confirmation' => 'required'
        ]);

        $request = request()->merge(['verification_code' => substr(md5(rand()),0,7)]);

        $attributes = $request->validate([
            'username' =>  'required|max:50|min:3|unique:user3s,username',
            'full_name' => 'required|max:50|min:3',
            'email' => 'required|email|max:100|unique:user3s,email',
            'phone' => 'required|digits_between:8,13|numeric',
            'password' => 'required|max:50|min:7|confirmed',
            'verification_code' => 'required'
        ]);
        //TODO:  //-na sasun ta messages p stelni error (eg. na men grafi full_name)
                 //-to password confirmation error na fkennei sto password_confirmation field

        //Must remove from $attributes



        //Make the account and add to db


        $user = User3::create($attributes);


        Mail::to($user->email)->queue(new \App\Mail\MailVerify($user->email, $user->username, $user->verification_code, 'www'));

        //TODO: email verification



        //Redirect to the login page
        return redirect('/login')->with('success',"Your account has been created successfully! Check your email for verification.");
                //To with stelnei minima success sto login page
                //It is checked on the login page using the www/components/toast.blade.php
                //en gia na fkalei ena popup "success"
    }

    public function createGuest(){
        //pws na mpenei o guest sto db?
        $attributes = request()->validate([
            'email' => 'required|email|max:100|unique:user3s,email'
        ]);
        //Must remove from $attributes

        //Make the account and add to db
        User3::create($attributes);

    }

}
