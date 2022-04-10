<?php

namespace App\Http\Controllers;

use App\Models\User3;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

//Na metonomasti o controller se user3 controller or LoginUser3?
//Not sure pos ton metonomazw omws bori na ta santanosume

//FOR USER1
class SessionsController extends Controller
{

    //Edit user3 profile
    public function edit()
    {

        //##TODO:
        //-Se tuntes formes na sasun ta error messages
        //-Na ginunte kochina ta input boxes j na mpenni to error me to class tou pukatw
        //-Ta error messages kapies fores ennen sta sosta field na sasun

        //Both change password and edit profile are here
        if(request()->has('form1'))
        {
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
        else if(request()->has('form2'))
        {
             //get the id of the user
            $id = Auth::guard('user3')->user()->id;

            $request = request()->merge([ 'username' => Auth::guard('user3')->user()->username]);
            $oldPassword = request()->validate(['username' => 'required', 'password' => 'required']);


            if (!Auth::guard('user3')->attempt($oldPassword))
            {
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

    public function destroy()
    {
        auth('user3')->logout();

        //Go back to login page and send a message of goodbye
        //ddd("ok");
        return redirect('/login')->with("logout", "Goodbye!");
    }

    public function create()
    {
        return view('www.login');
    }

    public function login()
    {

        //Validate the data
        //TODO: na dulefki j me email
        $request = request()->merge(['guest' => 0]);

        $attributes = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'guest'    => 'required'
        ]);

        //Check if credentials are ok
        if (!Auth::guard('user3')->attempt($attributes)) {
            return back()->withErrors(['message' => 'Your provided credentials could not be verified.']);
        }

        if(!Auth::guard('user3')->user()->is_verified){
            auth('user3')->logout();
            return back()->withErrors(['message' => 'Your account is not yet activated! Please check your email.']);
        };


        //Continue to login
        session()->regenerate();
        return redirect('/make-a-reservation')->withInput()->with('success', 'Welcome back!');
    }

    public function login_popup()
    {
        // return response()->json(['success'=>'Data is successfully added']);
        $request = request()->merge(['guest' => 0]);
        $attributes = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        //Check if credentials ar ok
        if (!Auth::guard('user3')->attempt($attributes)) {
            return 'Your provided credentials could not be verified.';
        }

        //Continue to login
        session()->regenerate();
        return 'success';
    }


    public function guest_popup()
    {

        //Prosthetw epipleon values oti en guest
        //J ena username p ginete generate me ena random arithmo + to id tou gia na en sioura unique
        //J ena random password pu en tha xrisimopoiithei potte apla gia na eshei password epd en prepei nan blank
        $request = request()->merge([
            'guest' => 1,
            'username' => "guest-" . mt_rand(1000000000, 9999999999) . strval(User3::max('id') + 1),
            'password' => bcrypt(uniqid() . strval(mt_rand(1000000, 9999999)) . uniqid())
        ]);


        //try{
        $attributes = $request->validate(
            [
                'full_name' => 'required|max:50|min:3',
                'phone' => 'required|digits_between:8,13|numeric',
                'email' => 'required|email|max:100|unique:user3s,email',
                'guest' => 'required',
                'username' => 'required',
                'password' => 'required'
            ],
            [
                'email.unique' => 'An account already exists with this email. You can just log in. :)'
            ]
        );
        // } catch (\Illuminate\Validation\ValidationException $e ) {
        //     return \response($e->errors(),400);
        // }

        //User3::create($attributes); en tha ginete create epd en tha exume session gia ton guest
        // ena ginete create otan kami j tin kratisi
        // alla afinnw to popup gt prp na ton anagkasw sto telos na kamei account

        session([
            'full_name' => $attributes['full_name'],
            'phone'     => $attributes['phone'],
            'email'     => $attributes['email']
        ]);

        return "success";
    }

    public function showBook()
    {
        //an ise logged in mpenni kanonika
        if (Auth::check('user3'))
            return view('www.book');

        //an ise guest mpenni kanonika (checkari p to session)
        else if (
            request()->session()->has('full_name')
            && request()->session()->has('phone')
            && request()->session()->has('email')
        )
            return view('www.book');

        //an den ise tpt kamnise redirect piso j fkalli su to login popup
        else
            return redirect('/seven-seas#login');
    }

    public function createBook()
    {
        //get data from the request if not logged in
        if (!Auth::check('user3')) {
            $fullname = session()->get('full_name');
            $phone = session()->get('phone');
            $email = session()->get('email');

            session()->forget(['full_name','phone','email']);


            $request = request()->merge([
                'guest' => 1,
                'username'  => "guest-" . mt_rand(1000000000, 9999999999) . strval(User3::max('id') + 1),
                'password'  => bcrypt(uniqid() . strval(mt_rand(1000000, 9999999)) . uniqid()),
                'full_name' => $fullname,
                'phone'     => $phone,
                'email'     => $email,

                //TODO enna prp na kataxorite j to guest account sto table (see code pukatw p en commented)
            ]);
        }
        else{
            //TODO get data from user account if logged in
        }


        //TODO na to kamume na dulefki
        //try{
        // $attributes = $request->validate(
        //     [
        //         'full_name' => 'required|max:50|min:3',
        //         'phone' => 'required|digits_between:8,13|numeric',
        //         'email' => 'required|email|max:100|unique:user3s,email',
        //         'guest' => 'required',
        //         'username' => 'required',
        //         'password' => 'required'
        //     ],
        //     [
        //         'email.unique' => 'The mail already exists, so you already have an account.'
        //     ]
        // );

        // } catch (\Illuminate\Validation\ValidationException $e ) {
        //     return \response($e->errors(),400);
        // }

        //TODO: make the account otan ena dulefki tuto (gia ton guest)
        //User3::create($attributes);

        //TODO na dulepsi j na ginete i kratisi

        return request()->all();
    }
}
