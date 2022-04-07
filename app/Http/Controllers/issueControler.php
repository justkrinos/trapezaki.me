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

    //We will see if we need it
    public function index()
    {
        $issues = Issue::latest()->paginate(5);

        return view('admin.issues', compact('issues'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

        $users = DB::table('users')->select('id', 'name', 'email')->get();
        return view('some-view')->with('users', $users);
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

    public function destroy($id)
    {
        $issue = Issue::findOrFail($id);
        $issue->delete();

        return redirect()->route('admin.index');
    }
}
