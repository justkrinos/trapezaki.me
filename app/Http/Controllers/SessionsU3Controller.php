<?php

namespace App\Http\Controllers;

use App\Models\User3;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

//FOR USER3
class SessionsU3Controller extends Controller
{

    public function destroy()
    {
        auth('user3')->logout();

        //Go back to login page and send a message of goodbye
        //ddd("ok");
        return redirect('/login')->with("logout", "Goodbye!");
    }

    public function show()
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
        session()->forget('city'); // gia na fiei to city an iparxei
        session()->regenerate();

        return redirect('/make-a-reservation')->withInput()->with('success', 'Welcome!');
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
        session()->forget('city');
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


    //TODO: tuto na mpi mesto search
    public function changeCity(){
        $validatedData = request()->validate([
            'city' => "required|in:Limassol,Larnaca,Paphos,Famagusta,Nicosia"
        ]);

        $user3 = Auth::guard('user3')->user();

        if($user3){
            $user3->city = $validatedData['city'];
            $user3->save();
        }else{
            session([ 'city' => $validatedData['city']]);
        }

        return 'success';
    }

}
