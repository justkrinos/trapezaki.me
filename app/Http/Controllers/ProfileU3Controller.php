<?php

namespace App\Http\Controllers;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileU3Controller extends ProfileController
{
    public function show() {
        $user3 = Auth::guard('user3')->user();
        return view('www.profile',[
            'user3' => $user3
        ]);
    }

    public function modify()
    {

        //##TODO:
        //-Se tuntes formes na sasun ta error messages (o tropos p fenunte sto view)
        //-Na ginunte kochina ta input boxes j na mpenni to error me to class tou pukatw
        //-Ta error messages kapies fores ennen sta sosta field na sasun
        //- nan descriptive to kateh form se tuto j sta alla has() se alla controllers
        //              dld na mennen 'form1' alla kapio name

        //Both change password and edit profile are here
        if(request()->has('changeAccountDetails'))
        {
            //User3 edit profile
            $attributes = request()->validate([
                'full_name' => 'required|max:50|min:3',
                'phone' => 'required|digits_between:8,13|numeric',
            ]);

            //update the details
            Auth::guard('user3')->user()->update($attributes);

            return redirect('/profile')->with("success", "Your changes have been applied successfully!");
        }
        //Change password
        else if(request()->has('changePassword'))
        {
             //get the id of the user
            $user = Auth::guard('user3')->user();

            $request = request()->merge([ 'username' => $user->username]);
            $oldPassword = request()->validate([
                'username' => 'required',
                 'password' => 'required|max:50|min:7'
            ]);


            if (!Auth::guard('user3')->attempt($oldPassword))
            {
                return redirect('/profile')->with("error", "The old password is incorrect.");
            }

            $pass = request()->validate([
                'password' => 'required',
                'new-password' => 'required|max:50|min:7',
                'new-password_confirmation' => 'required|same:new-password'
            ],[
                'new-password_confirmation.same' => 'The passwords do not match.'
            ]);

            $old_pass = $oldPassword['password'];
            $pass = $pass['new-password'];

            //checking if new pass==old pass
            if(strcmp($old_pass, $pass) == 0)
            {
                return redirect('/profile')->with("error", "The new password cannot be the same as the old one");
            }


            //update user password
            $user->password = $pass;
            $user->save();

            //log the user out to log in with the new password
            auth('user3')->logout();

            return redirect('/login')->with("success", "Your password has been updated. Please log in to continue.");
        }

    }


}
