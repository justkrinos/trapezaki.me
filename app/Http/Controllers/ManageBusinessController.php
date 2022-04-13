<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User2;

class ManageBusinessController extends Controller
{
    public function edit(Request $request)
    {
        if(request()->has('form1'))
        {

            $request['tags'] = $this->tagsToArray(request()['tags']);

            //User3 edit profile
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
        else if(request()->has('form2'))
        {
            //TODO
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
