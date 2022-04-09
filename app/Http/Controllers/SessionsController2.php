<?php

namespace App\Http\Controllers;

use App\Models\User2;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
//For USER2
class SessionsController2 extends Controller
{
    public function edit(Request $request)
    {
        //Both change password and edit profile are here
        //if(request()->has('form1'))
        //{
        if(request()->has('form1'))
        {

            $request['tags'] = $this->tagsToArray(request()['tags']);

            //User3 edit profile
            $validatedData = $request->validate([
                'description' => 'required|max:1000',

                'coffee' => 'in:on|required_without_all:food,drinks',
                'food' => 'in:on|required_without_all:coffee,drinks',
                'drinks' => 'in:on|required_without_all:coffee,food',

                'tags' => 'required',
                'tags.*' => 'regex:/^[\pL\s\-]+$/u|max:15'

            ],[
                'tags.*.regex' => 'Please only use aphabetic characters.'
            ]);

            $tags = $validatedData['tags'];
            unset($validatedData['tags']);

            //Change the format of type (food,drinks,coffee) using the private function of this object
            $validatedData = $this->formatType($validatedData);


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
