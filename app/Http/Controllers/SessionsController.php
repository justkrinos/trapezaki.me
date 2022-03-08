<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

//Na metonomasti o controller se user3 controller or LoginUser3?
//Not sure pos ton metonomazw omws bori na ta santanosume

class SessionsController extends Controller
{
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
        $attributes = request()->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        //Check if credentials ar ok
        if (!Auth::guard('user3')->attempt($attributes)) {
            return view('www.login')->withErrors(['message' => 'Your provided credentials could not be verified.']);
        }

        //Continue to login
        session()->regenerate();
        return redirect('/make-a-reservation')->withInput()->with('success', 'Welcome back!');
    }

    public function login_popup()
    {
        return response()->json(['success'=>'Data is successfully added']);
        // //TODO: na dulepsi j meta na to kamume ena function

        // //Validate the data
        // $attributes = request()->validate([
        //     'username' => 'required',
        //     'password' => 'required'
        // ]);

        // //Check if credentials ar ok
        // if (!Auth::guard('user3')->attempt($attributes)) {
        //     return view('www.login')->withErrors(['message' => 'Your provided credentials could not be verified.']);
        // }

        // //To prevent session fixation (stealing session IDs)
        // session()->regenerate();

        // //TODO: prp pu dame na katalavw an irta pu popup
        // //      gia na kamnw redirect analogws
        // //      isos me to session na to dw
        // //      btw prp nan javascript sto popp
        // //      epd prp na fkalli msg an en sosto to login
        // //      Sta login na to kamume na dulefki ite me email ite me username
        // //      but becareful se jinus p en guest epd exun email

        // //      episis prp na dw gia to guest pws enna kamni log in
        // //      isos na tu kamw ksexoristo session j na kamni logout
        // //      otan kami to reservation j na ligei se 10 lepta
        // //      btw prp j dame nan javascript gia na fkalli an en sosto to login

        // //session(['link' => url()->previous()]);
        // //if(session()->has('url.intended'))
        // return redirect('/make-a-reservation')->withInput()->with('success', 'Welcome back!');
    }

}
