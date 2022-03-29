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
    public function index()
    {
        $issues = Issue::all();

        /*
        Ta issues epistrefontai ola
        Prepei na kanume query
        na epistrefontai mono ta issues pou kataxwrise o sigkekrimenos xristis
        */

        return view('business.list-problems')
            ->with('issues', $issues);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('business.report-problem');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request = request()->merge(['user2_id' => Auth::guard('user2')->user()->id]);


        $attribute = $request->validate([
            'details' => 'required',
            'type' => 'required',
            'user2_id' => 'required'
        ]);

        Issue::create($request->all());

        return redirect()->route('report-problem.blade.php')
            ->with('success', 'Problem Reported Successfully.');
    }

    /**
     * Display the specified resource.
     */

    public function show(Issue $issue)
    {
        return view('business.list-problems', compact('issue'));
    }

}
