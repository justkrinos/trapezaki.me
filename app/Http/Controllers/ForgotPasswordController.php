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

    public function sendEmailUser3(){
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

    public function sendEmailUser2(){
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
}
