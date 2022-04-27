<?php

namespace App\Http\Controllers;

use App\Models\User3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileU3Controller extends Controller
{
    //Edit profile
    public function modify()
    {

        //##TODO:
        //-Se tuntes formes na sasun ta error messages
        //-Na ginunte kochina ta input boxes j na mpenni to error me to class tou pukatw
        //-Ta error messages kapies fores ennen sta sosta field na sasun
        //- nan descriptive to kateh form se tuto j sta alla has() se alla controllers
        //              dld na mennen 'form1' alla kapio name

        //Both change password and edit profile are here
        if (request()->has('form1')) {
            //User3 edit profile
            $attributes = request()->validate([
                'full_name' => 'required|max:50|min:3',
                'phone' => 'required|digits_between:8,13|numeric',
            ]);

            //get the id of the user
            $id = Auth::guard('user3')->user()->id;

            //$guest = User3::update($attributes);

            User3::where('id', $id)->first()->update($attributes);



            return redirect('/profile')->with("success", "Your changes have been applied successfully!");
        }
        //Change password
        else if (request()->has('form2')) {
            //get the id of the user
            $id = Auth::guard('user3')->user()->id;

            $request = request()->merge(['username' => Auth::guard('user3')->user()->username]);
            $oldPassword = request()->validate(['username' => 'required', 'password' => 'required']);


            if (!Auth::guard('user3')->attempt($oldPassword)) {
                return redirect('/profile')->with("error", "Wrong old password!");
            }

            $pass = request()->validate([
                'new-password' => 'required|max:50|min:7|confirmed',
                'new-password_confirmation' => 'required'
            ]);

            $old_pass = $_POST['password'];
            $pass = $_POST['new-password'];

            //checking if new pass==old pass
            if (strcmp($old_pass, $pass) == 0) {
                session()->flash('error', 'New Password cannot be the same as the old one!');
                return redirect('/profile')->with("error", "New Password cannot be the same as the old one!");
            }


            //updating user password
            $user = User3::find($id);
            $user->password = $pass;
            $user->save();

            //dd($user);
            //User3::where('id', $id)->first()->update($pass);
            //session()->flash('success','Your password has been updated');

            return redirect('/profile')->with("success", "Your password has been updated");
        }
    }

    public function show()
    {
        if (!Auth::check('user3'))
            return redirect('/');
        return view('www.profile');
    }
}
