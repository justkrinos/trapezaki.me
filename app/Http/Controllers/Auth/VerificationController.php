<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function verifyEmail($email,$secret,$user_type=null){
        $email = \base64_decode($email); //decode email address
        $secret = \base64_decode($secret); // decode verification_code
        $user_type = $user_type?\base64_decode($user_type):null; //decode user_type if not null else set to null

        if($user_type){ //if your have several or custom user
            //get the uppercase version of $user_type and check if supplied email and verification_code is valid
            //HARDCODED
          $user = \App\Models\User2::where('email',$email)->where('verification_code',$secret)->first();
        }else{ // use default user
          $user = \App\Models\User::where('email',$email)->where('verification_code',$secret)->first();
        }

        if($user){// if user exists in storage
                $user->is_verified = 1;
                $user->save();
            if($user_type){ //$user_type !=null
                if(Auth::guard($user_type)->check()){ // if loggedin
                  //redirect to to dashboard with email_verified flag set to true
                  return \redirect("/{$user_type}/dashboard?email_verified=true");
                }
                //redirect to to login with email_verified flag set to false
                return \redirect("/login/{$user_type}?email_verified=true");
            }else{ //$user_type == null
                if(Auth::check()){// if loggedin
                  //redirect to to dashboard with email_verified flag set to true
                  return \redirect("/{$user_type}/dashboard?email_verified=true");
                }
                //redirect to to login with email_verified flag set to false
                return \redirect("/login?email_verified=true");
            }
        }else{// user does not exist in storage
            return $user_type ? \redirect("/login/{$user_type}?email_verified=false") : \redirect("/login?email_verified=flase");
        }
    }
}
