<?php

namespace App\Http\Controllers;
use App\Models\User2;
use App\Models\User3;


use Illuminate\Http\Request;

class VerifyEmailController extends Controller
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

    private function verify($user, $secret)
    {
        if (!$user || strcmp($secret, $user->verification_code)) {
            return abort(404);
        } else {
            $user->is_verified = 1;
            $user->verification_code = substr(md5(rand()), 0, 25); //Create a new verification code
            $user->save();
            return redirect('/login')->with('success', 'Your account has been Activated! Please log in to continue.');
        }
    }
}
