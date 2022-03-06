<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

//Na metonomasti o controller se user3 controller or LoginUser3?
//Not sure pos ton metonomazw omws bori na ta santanosume

class SessionsController extends Controller
{
    public function destroy(){
        auth('user3')->logout();

        //Go back to login page and send a message of goodbye
        //ddd("ok");
        return redirect('/login')->with("logout","Goodbye!");
    }

    public function create(){
        return view('www.login');
    }

    public function login(){

        //Validate the data
        $attributes = request()->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        //Check if credentials ar ok
        if (! Auth::guard('user3')->attempt($attributes)){
            return back()->withErrors(['message' => 'Your provided credentials could not be verified.']);
        }

        //Continue to login

            //To prevent session fixation (stealing session IDs)
        session()->regenerate();
        return redirect('/make-a-reservation')->withInput()->with('success','Welcome back!');


    }



}
