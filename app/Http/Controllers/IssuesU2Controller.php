<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;
use Illuminate\Support\Facades\Auth;


class IssuesU2Controller extends Controller
{

    function show() {
        return view('business.report-problem');
    }


    public function store()
    {
        $request = request()->merge([
            'user2_id' => Auth::guard('user2')->user()->id,
            'status' => 0
        ]);


        $attribute = $request->validate([
            'details' => 'required',
            'type' => 'required',
            'user2_id' => 'required',
            'status' => 'required'
        ]);

        Issue::create($attribute);

        return view('business.report-problem');
    }

}
