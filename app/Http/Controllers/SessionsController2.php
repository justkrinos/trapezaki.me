<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;  
use Illuminate\Http\Request;

class SessionsController2 extends Controller
{
    public function destroy()
    {
        //dd('log the user out');
        auth('user2')->logout();

        return redirect('/')->with('logout','Goodbye!');
    }

    public function create()
    {
        return view('business.login');
    }

    public function login()
    {
        //validate the request
        $attributes = request()->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        

        if (! Auth::guard('user2')->attempt($attributes)) //attempt to log the user in with the given data/credentials
        {
            return back()->withErrors(['message' => 'Your provided credentials could not be verified.']);
        }

        //To prevent session fixation (stealing session IDs)
        session()->regenerate();

        return redirect('/dashboard')->withInput()->with('success','Welcome back!');
    
    }
}
