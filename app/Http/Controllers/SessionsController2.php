<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController2 extends Controller
{
    public function destroy()
    {
        //dd('log the user out');
        auth()->logout();

        return redirect('/')->with('success','Goodbye!');
    }
}
