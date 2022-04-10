<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User2;
use App\Models\User3;

class EmailController extends Controller
{
    public function verifyUser2($email,$secret){
        $user = User2::where('email',$email)->first();
        return $this->verify($user);
    }

    public function verifyUser3($email,$secret){
        $user = User3::where('email',$email)->first();
        return $this->verify($user);
    }

    private function verify($user){
        if(!$user || $user->is_verified){
            return redirect('/login')->with('success', 'Please log in to continue');
        } else{
            $user->is_verified = 1;
            $user->save();
            return redirect('/login')->with('success', 'Your account has been Activated! Please log in to continue.');
        }
    }
}
