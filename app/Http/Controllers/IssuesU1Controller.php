<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Issue;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\IssuesController;

// create one class for controler
class IssuesU1Controller extends IssuesController
{
    public function show() {
        $issues = Issue::all();

        return view('admin.issues',[
            'issues' => $issues
        ]);
    }

    public function modify()
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

        return view('admin.issues',[
            'issues' => Issue::all()
        ]);
    }
}
