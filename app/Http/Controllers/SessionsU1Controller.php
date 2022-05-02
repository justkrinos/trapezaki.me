<?php



namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\SessionsController;

use App\Models\User1;


class SessionsU1Controller extends SessionsController
{
    public function show(){
        return view('admin.login');
    }

    public function login(){
        //Validate the data
        $creds = request()->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        //Check if credentials are ok
        if (! Auth::guard('user1')->attempt($creds)){
            return back()->withErrors(['message' => 'Your provided credentials could not be verified.']);
        }

        //Continue to login

            //To prevent session fixation (stealing session IDs)
        session()->regenerate();
        return redirect('/manage-customers')->withInput()->with('success','Welcome!');


    }

    public function logout(){
        auth('user1')->logout();

        //Go back to login page and send a message of goodbye
        return redirect('/login')->with("logout","Goodbye!");
    }
}
