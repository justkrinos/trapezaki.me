<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User2;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
class ProfileU2Controller extends Controller
{


    public function modify(Request $request)
    {
        if(request()->has('form1'))
        {


            $request['tags'] = Tag::convertToArray(request()['tags']);

            //User3 edit profile
            $validatedData = $request->validate([
                'description' => 'required|max:1000',

                'coffee' => 'in:on|required_without_all:food,drinks',
                'food' => 'in:on|required_without_all:coffee,drinks',
                'drinks' => 'in:on|required_without_all:coffee,food',

                'tags' => 'required',
                'tags.*' => 'regex:/^[\pL\s\-]+$/u|max:15'

            ],
            [
                'tags.*.regex' => 'Please only use aphabetic characters.'
            ]);


            $tags = $validatedData['tags'];
            unset($validatedData['tags']);

            //Change the format of type (food,drinks,coffee) using the private function of this object
            $validatedData = User2::convertType($validatedData);


            $id = Auth::guard('user2')->user()->id;
            $user = User2::where('id', $id)->first();

            $user->update($validatedData);
            $user->retag($tags);


            return redirect('/profile')->with("success", "Your changes have been applied successfully!");
        }
        //Change password
        else if(request()->has('form2'))
        {
            //get the id of the user
            $id = request()->validate(['id' => 'required', 'username' => 'required']);


            $oldPassword = request()->validate(['username' => 'required', 'password' => 'required|max:50|min:7']);

            //dd($oldPassword);
            if (!Auth::guard('user2')->attempt($oldPassword))
            {
                session()->flash('error','Wrong old password!');
                return redirect('/profile')->with("error", "Wrong old password!");
            }

            $pass = request()->validate([
                'new-password' => 'required|max:50|min:7',
                'new-password_confirmation' => 'required|same:password'
            ],[
                'password_confirmation.same' => 'Passwords do not match.'
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
        else if(request()->has('menuForm'))
        {
            $validatedData = request()->validate([
                'menu' => "required|mimes:pdf|max:10000"
            ]);

            $id = Auth::guard('user2')->user()->id;
            $oldMenu = Auth::guard('user2')->user()->menu;

            $menuName = time() . strval($id) . uniqid() . '.' . request()->file('menu')->extension();
            request()->file('menu')->move(public_path('assets/menus/'), $menuName);

            File::delete('assets/menus/' . $oldMenu);


            $user = User2::where("id", $id)->first();
            $user->menu =$menuName;
            $user->save();

            return back()->with("success", "The Menu has been uploaded successfully");
        }
    }

    public function show () {
        return view('business.profile');
    }
}
