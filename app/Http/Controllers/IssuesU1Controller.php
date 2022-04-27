<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Issue;
use Illuminate\Support\Facades\DB;

// create one class for controller
class IssuesU1Controller extends Controller
{
    public function show() {
        return view('admin.issues');
    }


    public function flagIssue()
    {
        //return request()->all();
        $attribute = request()->validate([
            'status' => 'required',
            'id' => 'required'

        ]);

        //Issue::create($attribute);
        $id = request()->validate(['id' => 'required']);

        //$guest = User3::update($attributes);
        if($attribute!=NULL)
        {
            Issue::where('id', $id)->first()->update($attribute);
        }


        return view('admin.issues');
    }

}
