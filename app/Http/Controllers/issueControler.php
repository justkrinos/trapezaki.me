<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Issue;


// create one class for controler
class issueControler extends Controller
{


    // // create one function for creative record(render)
    // public function create()
    // {
    //     // EPISTREFEI TA APOTELESMATA
    //     return view(issues.blade.php ); /// NA TO KSANADO
    // };




    public function store()
    {
     //create the user `report`
     //an grapso



    $request = request()->merge(['user2_id' => Auth::guard('user2')->user()->id]);


    $attribute = $request->validate
     ([
        'details' => 'required',
        'type' => 'required',
        'user2_id' => 'required'
     ]);

    Issue::create($attribute);

     return "ok";
    //return view('business.report-problem');


    }
}


?>
