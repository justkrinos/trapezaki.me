<?php

namespace App\Http\Controllers;

use App\Models\User3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\RegisterController;


//A class to make the registration of user3
class RegisterU3Controller extends RegisterController
{
    //private $guest;

    public function show(){
        return view('www.signup');
    }

    public function create(){
        //Ta validation rules iparxun sto documentation tis laravel
        //An den einai success to validation, en tha proxorisi, enna kami redirect stin idia page me ta errors
        //Ta errors ginunte catch pu to blade view

        //extra validation for the password confirmation
        request()->validate([
            'password'                   => 'required|max:50|min:7',
            'password_confirmation'      => 'required|same:password'
        ],[
            'password_confirmation.same' => 'The passwords do not match.'
        ]);

        $request = request()->merge([
            'verification_code' => substr(md5(rand()),0,25),
            'guest'             => 0
        ]);

        $attributes = $request->validate([
            'username'          => 'required|max:50|min:3|unique:user3s,username',
            'full_name'         => 'required|max:50|min:3',
            'email'             => 'required|email|max:100|unique:user3s,email,NULL,id,guest,0',
            'phone'             => 'required|digits_between:8,13|numeric',
            'password'          => 'required|max:50|min:7',
            'verification_code' => 'required',
            'guest'             =>  'required'
        ]);

        //Make the account and add to db
        $user = User3::updateOrCreate(['email' => $attributes['email'], 'guest' => 1],$attributes);



        if(str_ends_with(env('APP_URL'),'.me')){
            Mail::to($user->email)->queue(new \App\Mail\MailVerify($user->email, $user->username, $user->verification_code, 'www'));
        }else if(str_ends_with(env('APP_URL'),'.test')){
            $user->is_verified = 1;
            $user->save();
        }

        Mail::to($user->email)->queue(new \App\Mail\MailPendingHandled
        ($user->email, "decline", $user->full_name));



        //Redirect to the login page
        return redirect('/login')->with('success',"Your account has been created successfully! Check your email for verification.");
                //To with stelnei minima success sto login page
                //It is checked on the login page using the www/components/toast.blade.php
                //en gia na fkalei ena popup "success"
    }


}
