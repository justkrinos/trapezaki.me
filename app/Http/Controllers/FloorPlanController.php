<?php

namespace App\Http\Controllers;
use App\Models\User2;
use Illuminate\Http\Request;

class FloorPlanController extends Controller
{
    function show($username){
        $user = User2::where('username',$username)->first();
        if($user){
            return view('admin.floorplan-editor');
        }else return abort(404);
    }
}
