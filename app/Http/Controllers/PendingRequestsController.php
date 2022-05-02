<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;
use App\Models\User2;

class PendingRequestsController extends Controller
{
    public function show()
    {
        $users2 = User2::all()->where('status', 0);
        //Diw sto view to variable users2 gia na to xrisimopoiisei
        //vriskw dld jinus p ennen activated
        return view('admin.pending-requests', [
            'users2' => $users2
        ]);
    }

    public function modify()
    {
        $validatedData = request()->validate([
            'username' => 'required',
            'action'   => 'required|in:accept,decline'
        ]);

        $username = $validatedData['username'];
        $action   = $validatedData['action'];

        $user2 = User2::where('username', $username)->first();

        if ($user2) {
            if ($action === 'accept') {
                if(!$user2->floorplan == null)
                    return 'no-floorplan';
                //TODO: approve mono an en filled ulla ta data!
                //sto manage customers na dixnei j ta pending j ta disabled j ta approved
                //sto manage customer na dulefki to koumpi approve alla na dixni j tus pending
                $user2->status = 2; //default na en disabled (pending=0, active=1, disabled=2)
                $user2->save();
                return 'success';
            } else if ($action == 'decline') {
                $user2->deletePhotos();
                $user2->floorPlan->delete();
                $user2->deleteMenu();
                $user2->detag();
                $user2->delete();
                return 'success';
            }
        }
        return 'error';
    }
}
