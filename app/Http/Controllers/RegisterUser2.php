<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User2;
use App\Models\User2_Photo;
use App\Http\Controllers\Time;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RegisterUser2 extends Controller
{
    public function view(){
        if(Auth::check('user2'))
            return redirect('/profile');
        return view('business.signup');
    }



    public function create(Request $request)
    {
        //Split the tags (comma separated) into an array
        //using this object's private function
        $request['tags'] = $this->tagsToArray($request['tags']);

        //First only validate password
        request()->validate([
            'password' => 'required|max:50|min:7',
            'password_confirmation' => 'required|same:password', //only check, don't save
        ],[
            'password_confirmation.same' => 'Passwords do not match.'
        ]);

        //verification code
        $request->merge(['verification_code' => substr(md5(rand()),0,25)]);

        //Then save the attributes of the record, because we don't want to include password confirmation
        $validatedData = $request->validate(
            [
                'username' => 'required|max:50|min:3|unique:user2s',
                'email' => 'required|max:50|unique:user2s|email',
                'password' => 'required|max:50|min:7',

                'business_name' => 'required|max:50|min:1|unique:user2s',
                'company_name' => 'required|max:50|min:1',
                'representative' => 'required|max:50|min:2',
                'phone' => 'required|max:13|min:8',
                'description' => 'required|max:1000',

                'photo' => 'required',
                'photo.*' => 'image|mimes:jpg,png,jpeg,svg|max:2048',
                'logo' => 'required|image|mimes:jpg,png,jpeg,svg|max:2048',
                'menu' => "required|mimes:pdf|max:10000",

                'address' => 'required|min:2',
                'postal' => 'required|numeric|max:999999|min:1',
                'city' => 'required|max:30|min:2',

                'coffee' => 'in:on|required_without_all:food,drinks',
                'food' => 'in:on|required_without_all:coffee,drinks',
                'drinks' => 'in:on|required_without_all:coffee,food',

                'long' => 'required|numeric|max:36',
                'lat'  => 'required|numeric|max:36',

                'tags' => 'required',
                'tags.*' => 'regex:/^[\pL\s\-]+$/u|max:15',
                'verification_code' => 'required'
            ],
            [
                'postal.numeric' => 'The postal code must be a number.',
                'postal.required' => 'The postal code is required.',
                'food.required_without_all' => 'Please select at least one service that you provide.',
                'photo.required' => 'The photos field is required',
                'photo.*.image' => 'The files must be images',
                'photo.*.mimes' => 'The files must be images',
                'photo.*.max'   => 'The maximum file size is 2048',
                'tags.*.regex' => 'Please only use aphabetic characters.'

            ]
        );

        //Change the format of type (food,drinks,coffee) using the private function of this object
        $validatedData = $this->formatType($validatedData);


        //Fefkw pu to a data osa  ennen mesto User2 Table
        $tags = $validatedData['tags'];
        unset($validatedData['tags']);
        unset($validatedData['photo']);
        unset($validatedData['logo']);

        $menuName = time() . uniqid() . '.' . request()->file('menu')->extension();
        request()->file('menu')->move(public_path('assets/menus/'), $menuName);

        $validatedData['menu'] = $menuName;


        //Create the account
        $user2 = User2::create($validatedData);

        //Vallw ta tags mesto table mesw tou relationship me ton user2
        $user2->tag($tags);
        $user2->floorPlan->save();

        //Create the default daily settings
        //TODO tuta en prp nan default alla nan null
        //j na prp na tu ta vali o admin gia na fiei pu pending
        $maxTime = new Time("22:00");
        $minTime = new Time("08:00");

        for($day=1; $day<8; $day++){
            $user2->dailySettings()->create([
                'day_id' => $day,
                'time_min' => $minTime->get(),
                'time_max' => $maxTime->get()
            ]);
        }


        // TODO na sasun tuta ta static methods ew na ginun eloquent relationships
        //Save the photos using a new method i created in the User2_Photo model
        User2_Photo::store_multiple(request()->file('photo'),$user2->id);

        //Save the logo same logic as above
        User2_Photo::store_logo(request()->file('logo'),$user2->id);

        if(str_ends_with(env('APP_URL'),'.me')){
            Mail::to($user2->email)->queue(new \App\Mail\MailVerify($user2->email, $user2->business_name, $user2->verification_code, 'business'));
        }else if(str_ends_with(env('APP_URL'),'.test')){
            $user2->is_verified = 1;
            $user2->save();
        }


        return redirect('/login')->with('success', "Your account has been created successfully! Check your email for verification.");

    }



    //Function gia xrisi mesa sto object pu kamni format to type (food coffe drinks)
    private function formatType(array $validatedData){
        //Kamni ta tis morfis coffee:food:drinks gia osa iparxun
        //etsi wste na borume na ta kamume extract later

        $stringToMake = ""; //to string pu ena stilume pisw
        $dataToChange = ['coffee','food','drinks']; //jina p ena checkarume



        foreach ($dataToChange as $type) { //gia kathe ena p jina p ena checkarume
            if (array_key_exists($type,$validatedData)){ //an iparxi
                if (empty($stringToMake))
                    $stringToMake .= $type; //men tu valis : an akoma en ofkero
                else
                    $stringToMake .= ':' . $type; //vartu : afu empike idi ena mesto array
            }
            //diagrafw ta data pu mesa gt thelw mono to (type => food:coffee klp)
            unset($validatedData[$type]);
        }

        //vallw tu to string p ekama p en ulla mesa
        $validatedData['type'] = $stringToMake;

        //diw to pisw sto function pu to kalese
        return $validatedData;
    }

    private function tagsToArray(string $tags){
        //Asxolithu mono an dennen ofkero, alios aisto na fkalei error sto view
        if (!empty($tags)) {
            //En xwrismena se komma, ara kamnw ta se array
            $tags = explode(',', $tags);

            //To polli 10 tags na mpennun alliws na men mpennei tpt
            if(count($tags) > 10)
                $tags = [];
        }
        //Stelnw pisw  to array p ekama
        //gia na to valw mesto request mou gia na ginei to validate
        return $tags;
    }
}
