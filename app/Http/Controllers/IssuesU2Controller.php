<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\IssuesController;


class IssuesU2Controller extends Controller
{
    public function store(){
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

        $issue = Issue::create($attribute);
        if($issue)
            return redirect('/report-problem')->with('success', "The issue was submitted succesfully!");
        else
            return redirect('/report-problem')->with('success', "Oops! Something went wrong");

    }

    public function show(){
        $user2 = auth('user2')->user();
        $issues = $user2->issues;

        return view('business.report-problem', [
            'issues' => $issues
        ]);
    }

}
