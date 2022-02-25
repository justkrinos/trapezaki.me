<?php



namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class User1Controller extends Controller
{
    public function create(){
        return view('admin.login');
    }

    public function login(){

        //Validate the data
        $attributes = request()->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        //Check if credentials ar ok
        if (! Auth::guard('user1')->attempt($attributes)){
            return back()->withErrors(['message' => 'Your provided credentials could not be verified.']);
        }

        //Continue to login

            //To prevent session fixation (stealing session IDs)
        session()->regenerate();
        return redirect('/manage-customers')->withInput()->with('success','Welcome back!');


    }
}
