<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User2;

class EmailController extends Controller
{
    public function verify($email,$secret){
        $user = User2::where('email',$email)->first();
        if(!$user || $user->is_verified){
            return redirect('/')->with('success', 'Please log in to continue');
        } else{
            $user->is_verified = 1;
            $user->save();
            return redirect('/')->with('success', 'Your account has been Activated! Please log in to continue.');
        }
    }
}
