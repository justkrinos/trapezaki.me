<?php

namespace App\Http\Controllers;

use App\Models\User2;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;


//For USER2
class SessionsU2Controller extends Controller
{

    public function destroy()
    {
        //dd('log the user out');
        auth('user2')->logout();

        return redirect('/')->with('logout','Goodbye!');
    }

    public function show()
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


        //TODO: Gia to Keep me logged in, evre to section Remembering Users https://laravel.com/docs/7.x/authentication



        if (! Auth::guard('user2')->attempt($attributes)) //attempt to log the user in with the given data/credentials
        {
            return back()->withErrors(['message' => 'Your provided credentials could not be verified.']);
        }

        if(!Auth::guard('user2')->user()->is_verified){
            auth('user2')->logout();
            return back()->withErrors(['message' => 'Your account is not yet verified! Please check your email.']);
        };

        if(!Auth::guard('user2')->user()->status){
            auth('user2')->logout();
            return back()->withErrors(['message' => 'Your account activation is pending. Our team will contact you soon.']);
        };


        //To prevent session fixation (stealing session IDs)
        session()->regenerate();

        return redirect('/manage-reservations')->withInput()->with('success','Welcome!');

    }

}
