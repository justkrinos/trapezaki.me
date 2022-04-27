<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User2;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;


class ManageBusinessController extends Controller
{
    public function edit(Request $request, User2 $user2)
    {
        if(request()->has('businessInfo'))
        {

            $request['tags'] = $this->tagsToArray(request()['tags']);

            //User3 edit profile
            //TODO na exei error an den epilekses kanena type
            $validatedData = $request->validate([
                'id' => 'required',
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
            //ddd($validatedData);

            $tags = $validatedData['tags'];
            unset($validatedData['tags']);

            //Change the format of type (food,drinks,coffee) using the private function of this object
            $validatedData = $this->formatType($validatedData);


            $id = $validatedData['id'];
            $user = User2::where('id', $id)->first();

            $username = $user->username;

            $user->update($validatedData);
            $user->retag($tags);


            return redirect('/user/' . $username)->with("success", "Your changes have been applied successfully!");
        }
        else if(request()->has('reservationSettings'))
        {

            //TODO: -to reservation range na ginete validate se mod 30
            //      -na erkunte pisw errors (ena gia oulla alla perigrafiko)
            $validatedData = request()->validate([
                'res_range' => 'required|numeric',
                'duration'  => 'required|numeric',
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
            for($day=1; $day<8; $day++){
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

            return back()->with('success', 'The Reservation Management has been updated successfully');


        }
        else if(request()->has('menuForm'))
        {
            $validatedData = request()->validate([
                'id' => "required",
                'menu' => "required|mimes:pdf|max:10000"
            ]);


            $menuName = time() . strval($validatedData['id']) . uniqid() . '.' . request()->file('menu')->extension();
            request()->file('menu')->move(public_path('assets/menus/'), $menuName);

            $user = User2::where("id", $validatedData['id'])->first();

            $user->menu =$menuName;
            $user->save();

            return back()->with("success", "The Menu has been uploaded successfully");
        }
        //An thelw na allaksw to status
        else if(request()->has('action'))
        {
            $validatedData = request()->validate([
                'username' => 'required',
                'action'   => 'required|in:activate,disable'
            ]);

            $username = $validatedData['username'];
            $action   = $validatedData['action'];

            $user2 = User2::where('username',$username)->first();

            if($action === 'disable'){

                if($user2){
                    $user2->status = 2;
                   /* $user2->deletePhotos();
                    $user2->detag();
                    $user2->delete();
                    User2::truncate();*/
                    $user2->save();
                    return 'success';
                }

            }else if($action == 'activate'){

                if($user2){
                    $user2->status = 1;
                    $user2->save();
                    return 'success';
                }
            }
            return 'error';
        }
    }

    public function show(User2 $user2) {
        $newDailySettings = [];
        foreach ($user2->dailySettings as $setting){
            $minTime = Time::createFromInt($setting->time_min)->getStr();
            $maxTime = Time::createFromInt($setting->time_max)->getStr();
            array_push($newDailySettings,array('day' => $setting->day_id, 'min' => $minTime, 'max' => $maxTime));
        }


        return view('admin.manage-customer',[
            'user2' => $user2,
            'tags'  => $user2->tags->pluck('name')->toArray(),
            'settings' => $newDailySettings
        ]);
    }

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

    public function getMenu(User2 $user2)
    {
        $file = File::get(public_path('assets/menus/') . $user2->menu);
        $response = Response::make($file, 200);
        $response->header('Content-Type', 'application/pdf');
        return $response;
    }
}
