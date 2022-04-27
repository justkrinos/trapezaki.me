<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User3;
use App\Models\User2;


class ForgotPasswordController extends Controller
{
    public function show(){
        return view('www.forgot-password');
    }

    public function sendEmailU3(){
        $validatedData = request()->validate([
            'email' => 'required|string|email|max:255'
        ]);

        //  TODO: na ginei  base64 to email gt bori na men dulefkli to link

        $user = User3::where('email',$validatedData['email'])->first();

        if($user){
            if(str_ends_with(env('APP_URL'),'.me')) //stelni email mono o server oi sto local
                 Mail::to($validatedData['email'])->queue(new \App\Mail\MailForgotPassword($user->email, $user->verification_code, 'www'));
        }

        return redirect('/login')->with('success', 'An email with password recovery instructions was sent to your inbox!');
    }

    public function sendEmailU2(){
        $validatedData = request()->validate([
            'email' => 'required|string|email|max:255'
        ]);

        //  TODO: na ginei  base64 to email gt bori na men dulefkli to link

        $user = User2::where('email',$validatedData['email'])->first();

        if($user){
            if(str_ends_with(env('APP_URL'),'.me')) //stelni email mono o server oi sto local
                 Mail::to($validatedData['email'])->queue(new \App\Mail\MailForgotPassword($user->email, $user->verification_code, 'business'));
        }

        return redirect('/login')->with('success', 'An email with password recovery instructions was sent to your inbox!');
    }

    public function showForgotU2($email,$secret){
        $user = User2::where('email', $email)->first();
        //check an den en null o user
        //j an to verification code en to sosto
        if ($user && !strcmp($secret, $user->verification_code))
            return view('www.change-password');
        else return abort(404);
    }

    public function showForgotU3($email, $secret)
    {
        $user = User3::where('email', $email)->first();
        //check an den en null o user
        //j an to verification code en to sosto
        if ($user && !strcmp($secret, $user->verification_code))
            return view('www.change-password');
        else return abort(404);
    }

    public function modifyForgotU3($email, $secret)
    {
        $user = User3::where('email', $email)->first();
        return $this->changePassword($user,$secret, request());
    }

    public function modifyForgotU2($email, $secret)
    {
        $user = User2::where('email', $email)->first();
        return $this->changePassword($user,$secret, request());
    }

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
