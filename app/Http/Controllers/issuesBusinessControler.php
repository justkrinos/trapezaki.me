<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;
use Illuminate\Support\Facades\Auth;


class issuesBusinessControler extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //We will see if we need it
    public function index()
    {
        $issues = Issue::all();

        /*
        TODO
        Ta issues epistrefontai ola
        Prepei na kanume query
        na epistrefontai mono ta issues pou kataxwrise o sigkekrimenos xristis
        */

        return view('business.list-problems')
            ->with('issues', $issues);
    }

    /**
     * Store a newly created resource in storage.
     */
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

        return redirect('report-problem')->with('success', "The issue was submitted succesfully!");
    }

    /**
     * Display the specified resource.
     */

    public function show(Issue $issue)
    {
        return view('business.list-problems', compact('issue'));
    }

}
