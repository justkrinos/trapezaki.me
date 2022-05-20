<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Daily_Setting;
use App\Http\Controllers\ProfileController;
use App\Models\User2;
use App\Http\Controllers\Format;
use App\Models\User2_Photo;

class ProfileU2Controller extends ProfileController
{
    public function modify()
    {
        //TODO fix this
        if((request()->has('first'))||(request()->has('last')))
        {
            $day = request("day");
            $day_id = 1;
            switch ($day)
            {
                case "Monday":
                    $day_id = 1;
                    break;

                case "Tuesday":
                    $day_id = 2;
                    break;

                case "Wednesday":
                    $day_id = 3;
                    break;

                case "Thursday":
                    $day_id = 4;
                    break;

                case "Friday":
                    $day_id = 5;
                    break;

                case "Saturday":
                    $day_id = 6;
                    break;

                case "Sunday":
                    $day_id = 7;
                    break;
            }

            $day = Daily_Setting::where('day_id', $day_id)->where('user2_id', Auth::guard('user2')->user()->id)->first();

            $minTime = Time::createFromInt($day->time_min)->getStr();
            $maxTime = Time::createFromInt($day->time_max)->getStr();

            return [$minTime, $maxTime];
        }
        if(request()->has('detailsForm'))
        {

            request()->validate([
                'tags' => 'required'
            ]);

            request()['tags'] = Format::tagsToArray(request()['tags']);

            //User3 edit profile
            $validatedData = request()->validate([
                'description' => 'required|max:1000',
                'representative' => 'required|max:50|min:2',

                'coffee' => 'in:on|required_without_all:food,drinks',
                'food' => 'in:on|required_without_all:coffee,drinks',
                'drinks' => 'in:on|required_without_all:coffee,food',

                'tags' => 'required',
                'tags.*' => 'regex:/^[\pL\s\-]+$/u|max:15'

            ],
            [
                //TODO: nmz en fkalli error msg ama en epileksis kanena service
                'food.required_without_all' => 'Please select at least one service that you provide.',
                'coffee.required_without_all' => 'Please select at least one service that you provide.',
                'drinks.required_without_all' => 'Please select at least one service that you provide.',
                'tags.*.regex' => 'Please only use alphabetic characters for tags.'
            ]);


            $tags = $validatedData['tags'];
            unset($validatedData['tags']);

            //Change the format of type (food,drinks,coffee) using the private function of this object
            $validatedData = Format::formatType($validatedData);

            $user = auth('user2')->user();
            $user->update($validatedData);
            $user->retag($tags);


            return redirect('/profile')->with("success", "Your changes have been applied successfully!");
        }
        else if(request()->has('passwordForm'))
        {
            // //get the id of the user
            // $id = request()->validate([
            //     'id' => 'required',
            //     'username' => 'required'
            // ]);


            $oldPassword = request()->validate([
                'username' => 'required',
                'password' => 'required|max:50|min:7'
            ]);

            if (!Auth::guard('user2')->attempt($oldPassword))
            {
                session()->flash('password','The old password is incorrect');
                return redirect('/profile')->with("error", "The old password is incorrect");
            }

            $pass = request()->validate([
                'new-password' => 'required|max:50|min:7',
                'new-password_confirmation' => 'required|same:new-password'
            ],[
                'new-password_confirmation.same' => 'The passwords do not match.',
                'new-password.min' => 'The new password must be at least 7 characters.',

            ]);

            $old_pass = $_POST['password'];
            $pass = $_POST['new-password'];

            //checking if new pass==old pass
            if(strcmp($old_pass, $pass) == 0)
            {
                session()->flash('error','The new password cannot be the same as the old one');
                return redirect('/profile')->with("error", "The new password cannot be the same as the old one");
            }

            $id = $_POST['id'];
            //updating user password
            $user = User2::find($id);
            $user->password = $pass;
            $user->save();

            //dd($user);
            //User3::where('id', $id)->first()->update($pass);
            //session()->flash('success','Your password has been updated');

            auth('user3')->logout();
            return redirect('/login')->with("success", "Your password has been updated. Please log in to continue.");
        }
        else if(request()->has('logoForm')){
            $data = request()->validate([
                'logo' => 'required|image|mimes:jpg,png,jpeg,svg|max:2048'
            ],[
                'logo.mimes'    => 'The logo must be an image.'
            ]);

            $user2 = auth('user2')->user();
            User2_Photo::update_logo(request()->file('logo'),$user2->id);

            return back()->with('success', "The logo has been uploaded successfully!");

        }
    }

    public function show(){
        $user2 = Auth::guard('user2')->user();
        $tags = $user2->tags->pluck('name')->toArray();

        //TODO: fix this na en opws tu admin
        $day = $user2->dailySettings->where('day_id', 1)->first();
        $max = (Time::createFromInt($day->time_max))->getStr();
        $min = (Time::createFromInt($day->time_min))->getStr();

        return view('business.profile',[
            'tags' => $tags,
            'max'  => $max,
            'min'  => $min,
            'user2'=> $user2
        ]);
    }


}
