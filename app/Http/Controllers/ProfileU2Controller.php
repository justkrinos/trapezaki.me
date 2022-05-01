<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Daily_Setting;

class ProfileU2Controller extends Controller
{
    public function modify(Request $request)
    {
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


            $request['tags'] = $this->tagsToArray(request()['tags']);

            //User3 edit profile
            $validatedData = $request->validate([
                'description' => 'required|max:1000',
                'representative' => 'required|max:50|min:2|regex:/^[\pL\s\-]+$/u',

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
            $validatedData = $this->formatType($validatedData);

            $user = auth('user2')->user();
            $user->update($validatedData);
            $user->retag($tags);


            return redirect('/profile')->with("success", "Your changes have been applied successfully!");
        }
        //Change password
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
                session()->flash('password','Wrong old password!');
                return redirect('/profile')->with("error", "The old password is incorrect");
            }

            $pass = request()->validate([
                'new-password' => 'required|max:50|min:7',
                'new-password_confirmation' => 'required|same:password'
            ],[
                'new-password_confirmation.same' => 'Passwords do not match.'
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
