<?php

namespace App\Http\Controllers;

use App\Models\User3;
use Illuminate\Http\Request;

//A class to make the registration of user3
class RegisterUser3 extends Controller
{
    public function view(){
        return view('www.signup');
    }

    public function create(){


        //Ta validation rules iparxun sto documentation tis laravel
        //An den einai success to validation, en tha proxorisi, enna kami redirect stin idia page me ta errors
        //Ta errors ginunte catch pu to blade view
        $attributes = request()->validate([
            'username' =>  'required|max:50|min:3|unique:user3s,username',
            'full_name' => 'required|max:50|min:3',
            'email' => 'required|email|max:100|unique:user3s,email',
            'phone' => 'required|max:13|min:8',
            'password' => 'required|max:50|min:7',
            //'password_ver' => 'required|max:50|min:7' //TODO
        ]);


        //Make the account and add to db
        User3::create($attributes);



        //TODO: email verification



        //Redirect to the login page
        return redirect('/login')->with('success',"Your account has been created successfully! Check your email for verification.");;
                //To with stelnei minima success sto login page
                //It is checked on the login page using the www/components/toast.blade.php
                //en gia na fkalei ena popup "success"
    }

}