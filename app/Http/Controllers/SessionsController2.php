<?php

namespace App\Http\Controllers;
use App\Models\User2;
use Illuminate\Support\Facades\Auth;  
use Illuminate\Http\Request;
//For USER2
class SessionsController2 extends Controller
{
    public function edit()
    {
        //Both change password and edit profile are here
        //if(request()->has('form1'))
        //{
        if(request()->has('form1'))
        {
            //User3 edit profile
            $attributes = request()->validate([
                'description' => 'required|max:1000'
            ]);

            //how are we gonan change the type?

            //get the id of the user
            $id = request()->validate(['id' => 'required']);

            //$guest = User3::update($attributes);
            
            User2::where('id', $id)->first()->update($attributes);

            return redirect('/profile')->with("success", "Your changes have been applied successfully!");
        }
        //Change password
        else if(request()->has('form2'))
        {
            //get the id of the user
            $id = request()->validate(['id' => 'required', 'username' => 'required']);

            //dd(bcrypt($_POST['old-password']));

            //$_POST["username"] = User3::find($id)->username;



            $oldPassword = request()->validate(['username' => 'required', 'password' => 'required|max:50|min:7']);

            //dd($oldPassword);
            if (!Auth::guard('user2')->attempt($oldPassword))
            {
                session()->flash('error','Wrong old password!');
                return redirect('/profile')->with("error", "Wrong old password!");
            }

            $pass = request()->validate([
                'new-password' => 'required|max:50|min:7|confirmed',
                'new-password_confirmation' => 'required'
            ]);

            $old_pass = $_POST['password'];
            $pass = $_POST['new-password'];

            //checking if new pass==old pass
            if(strcmp($old_pass, $pass) == 0)
            {
                session()->flash('error','New Password cannot be the same as the old one!');
                return redirect('/profile')->with("error", "New Password cannot be the same as the old one!");
            }

            $id = $_POST['id'];
            //updating user password
            $user = User2::find($id);
            $user->password = $pass;
            $user->save();

            //dd($user);
            //User3::where('id', $id)->first()->update($pass);
            //session()->flash('success','Your password has been updated');

            return redirect('/profile')->with("success", "Your password has been updated");
        }
    }

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
