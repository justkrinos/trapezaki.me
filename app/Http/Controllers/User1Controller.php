<?php



namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Models\User1;


class User1Controller extends Controller
{
    public function create(){
        return view('admin.login');
    }

    public function login(Request $request){

        //Validate the data
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $creds = $request->only('username','password');

        //Check if credentials ar ok
        if (! Auth::guard('user1')->attempt($creds)){
            return back()->withErrors(['message' => 'Your provided credentials could not be verified.']);
        }

        //Continue to login

            //To prevent session fixation (stealing session IDs)
        session()->regenerate();
        return redirect('/manage-customers')->withInput()->with('success','Welcome back!');


    }

    public function logout(){
        auth('user1')->logout();

        //Go back to login page and send a message of goodbye
        return redirect('/login')->with("logout","Goodbye!");
    }
}
