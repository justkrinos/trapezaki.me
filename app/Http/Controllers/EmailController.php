<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User2;
use App\Models\User3;

class EmailController extends Controller
{
    public function verifyUser2($email, $secret)
    {
        $user = User2::where('email', $email)->first();
        return $this->verify($user,$secret);
    }

    public function verifyUser3($email, $secret)
    {
        $user = User3::where('email', $email)->first();
        return $this->verify($user,$secret);
    }

    public function showForgotUser2($email,$secret){
        $user = User2::where('email', $email)->first();
        //check an den en null o user
        //j an to verification code en to sosto
        if ($user && !strcmp($secret, $user->verification_code))
            return view('www.change-password');
        else return abort(404);
    }

    public function showForgotUser3($email, $secret)
    {
        $user = User3::where('email', $email)->first();
        //check an den en null o user
        //j an to verification code en to sosto
        if ($user && !strcmp($secret, $user->verification_code))
            return view('www.change-password');
        else return abort(404);
    }

    public function modifyForgotUser3($email, $secret)
    {
        $user = User3::where('email', $email)->first();
        return $this->changePassword($user,$secret, request());
    }

    public function modifyForgotUser2($email, $secret)
    {
        $user = User2::where('email', $email)->first();
        return $this->changePassword($user,$secret, request());
    }


    private function verify($user, $secret)
    {
        if (!$user || !strcmp($secret, $user->verification_code)) {
            return abort(404);
        } else {
            $user->is_verified = 1;
            $user->verification_code = substr(md5(rand()), 0, 25); //Create a new verification code
            $user->save();
            return redirect('/login')->with('success', 'Your account has been Activated! Please log in to continue.');
        }
    }

    //TODO: tuto prp na iparxei sto model or sto controller j oi sto email
    private function changePassword($user,$secret, $request){
            //check an den en null o user
        //j an to verification code en to sosto
        if ($user && !strcmp($secret, $user->verification_code)) {
            $request->validate([
                'password' => 'required|max:50|min:7',
                'password_confirmation' => 'required|same:password', //only check, don't save
            ], [
                'password' => 'required|max:50|min:7',
                'password_confirmation.same' => 'Passwords do not match.'
            ]);

            $user->password = $request->all()['password'];
            $user->verification_code = substr(md5(rand()), 0, 25);
            $user->save();
            return redirect('/login')->with('success', 'Your password has been changed! Please log in to continue');
        } else return back();
    }
}
