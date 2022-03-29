<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Issue;
use Illuminate\Support\Facades\DB;

// create one class for controler
class issueControler extends Controller
{


    // // create one function for creative record(render)
    // public function create()
    // {
    //     // EPISTREFEI TA APOTELESMATA
    //     return view(issues.blade.php ); /// NA TO KSANADO
    // };

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $issues = Issue::latest()->paginate(5);

        return view('admin.issues',compact('issues'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

            $users = DB::table('users')->select('id','name','email')->get();
            return view('some-view')->with('users', $users);
    }




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

    return request()-> all() ;
     //return "ok";
    //return view('business.report-problem');


    }


    public function destroy(Issue $Issue)   //DOKIMASTIKO
    {                                       //DOKIMASTIKO
       $Issue->delete();                    //DOKIMASTIKO

        return redirect()->route('admin.issues')    //DOKIMASTIKO
                        ->with('faild ','Cant Be Solved your problem ');    //DOKIMASTIKO
      }                                                                      //DOKIMASTIKO



}


?>
