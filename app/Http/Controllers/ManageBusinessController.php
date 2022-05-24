<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User2;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Format;
use App\Models\User2_Photo;



class ManageBusinessController extends Controller
{
    public function modify(Request $request, User2 $user2)
    {
        if (request()->has("locationForm")) {
            $validatedData = request()->validate([
                'address' => 'required|min:2',
                'postal' => 'required|numeric|max:7999|min:1000',
                'city' => 'required|max:30|min:2|in:Paphos,Limassol,Nicosia,Larnaca,Famagusta',
                'lat' => 'required|numeric|max:36',
                'long' => 'required|numeric|max:36',
            ], [
                'city.in'   => 'The city must be one of the following: Paphos, Limassol, Nicosia, Larnaca, Famagusta.'
            ]);

            $user2->update($validatedData);

            return redirect('/user/' . $user2->username)->with("success", "Your changes have been applied successfully!");
        } else if (request()->has('businessInfo')) {

            request()->validate([
                'tags' => 'required'
            ]);

            $request['tags'] = Format::tagsToArray(request()['tags']);

            // ddd($request->all());

            //User3 edit profile
            //TODO na exei error an den epilekses kanena type
            $validatedData = $request->validate(
                [
                    'id' => 'required',
                    'description' => 'required|max:1000',
                    'representative' => 'required|max:50|min:2',

                    'coffee' => 'in:on|required_without_all:food,drinks',
                    'food' => 'in:on|required_without_all:coffee,drinks',
                    'drinks' => 'in:on|required_without_all:coffee,food',

                    'tags' => 'required',
                    'tags.*' => 'regex:/^[\pL\s\-]+$/u|max:15'

                ],
                [
                    'food.required_without_all' => 'Please select at least one service that you provide.',
                    'coffee.required_without_all' => 'Please select at least one service that you provide.',
                    'drinks.required_without_all' => 'Please select at least one service that you provide.',
                    'tags.*.regex' => 'Please only use alphabetic characters for the tags.'
                ]
            );

            $tags = $validatedData['tags'];
            unset($validatedData['tags']);

            //Change the format of type (food,drinks,coffee)
            $validatedData = Format::formatType($validatedData);

            $user2->update($validatedData);
            $user2->retag($tags);

            return redirect('/user/' . $user2->username)->with("success", "Your changes have been applied successfully!");
        } else if (request()->has('reservationSettings')) {

            $validatedData = request()->validate([
                'res_range' => 'required|numeric',
                'duration'  => 'required|numeric|min:30|max:420',
                'min-1'     => 'required|date_format:H:i',
                'min-2'     => 'required|date_format:H:i',
                'min-3'     => 'required|date_format:H:i',
                'min-4'     => 'required|date_format:H:i',
                'min-5'     => 'required|date_format:H:i',
                'min-6'     => 'required|date_format:H:i',
                'min-7'     => 'required|date_format:H:i',
                'max-1'     => 'required|date_format:H:i',
                'max-2'     => 'required|date_format:H:i',
                'max-3'     => 'required|date_format:H:i',
                'max-4'     => 'required|date_format:H:i',
                'max-5'     => 'required|date_format:H:i',
                'max-6'     => 'required|date_format:H:i',
                'max-7'     => 'required|date_format:H:i',
            ]);

            //Apply duration and reservation settings changes
            $user2->duration  = $validatedData['duration'];
            $user2->res_range = $validatedData['res_range'];
            $user2->save();

            //get user day settings
            $userSettings = $user2->dailySettings;

            //for each day
            for ($day = 1; $day < 8; $day++) {
                //get the setting
                $daySetting = $userSettings->where('day_id', $day)->first();

                //get min max as time objects
                $min = new Time($validatedData['min-' . $day]);
                $max = new Time($validatedData['max-' . $day]);

                //save min max as integers
                $daySetting->time_min = $min->get();
                $daySetting->time_max = $max->get();
                $daySetting->save();
            }

            return back()->with('success', 'Your changes have been applied successfully');
        } else if (request()->has('menuForm')) {
            $validatedData = request()->validate([
                'menu' => "required|mimes:pdf|max:10000"
            ]);


            $menuName = time() . strval($user2->id) . uniqid() . '.' . request()->file('menu')->extension();
            request()->file('menu')->move(public_path('assets/menus/'), $menuName);

            $user2->menu = $menuName;
            $user2->save();

            return back()->with("success", "The menu has been uploaded successfully.");
        } else if (request()->has('action')) {
            $validatedData = request()->validate([
                'action'   => 'required|in:activate,disable'
            ]);

            $action   = $validatedData['action'];

            if ($action === 'disable') {
                $user2->status = 2;
                $user2->save();
                return 'success';
            } else if ($action == 'activate') {
                $user2->status = 1;
                $user2->save();
                return 'success';
            }
            return 'error';
        } else if (request()->has('logoForm')) {
            $data = request()->validate([
                'logo' => 'required|image|mimes:jpg,png,jpeg,svg|max:2048'
            ], [
                'logo.mimes'    => 'The logo must be an image.'
            ]);

            User2_Photo::update_logo(request()->file('logo'), $user2->id);
            return back()->with('success', "The logo has been uploaded successfully!");
        }
    }

    public function show(User2 $user2)
    {
        $newDailySettings = [];
        foreach ($user2->dailySettings as $setting) {
            $minTime = Time::createFromInt($setting->time_min)->getStr();
            $maxTime = Time::createFromInt($setting->time_max)->getStr();
            array_push($newDailySettings, array('day' => $setting->day_id, 'min' => $minTime, 'max' => $maxTime));
        }


        return view('admin.manage-customer', [
            'user2' => $user2,
            'tags'  => $user2->tags->pluck('name')->toArray(),
            'settings' => $newDailySettings
        ]);
    }

    public function showAll()
    {
        //show those that are not pending
        $users2 = User2::where('status', '1')->orWhere('status', '2')->get();

        //show the view
        return view('admin.manage-customers', [
            'users2' => $users2
        ]);
    }
}
