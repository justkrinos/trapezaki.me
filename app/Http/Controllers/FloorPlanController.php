<?php

namespace App\Http\Controllers;

use App\Models\User2;
use App\Models\Table;
use Illuminate\Http\Request;

class FloorPlanController extends Controller
{
    function show(User2 $user2)
    {
        return view('admin.floorplan-editor', [
            'user2' => $user2
        ]);
    }

    function getFloorPlanJson(User2 $user2)
    {
        if ($user2->floorPlan->json) //an den en ofkero stilto
            return $user2->floorPlan->json;
        else
            return []; //aliws stile ofkero gia na kserei oti en null
    }

    function modify(User2 $user2)
    {
        $validatedData = request()->validate([
            'floorplan' => 'required',
            'tables'    => 'required|array|min:1',
            'tables.*'  => 'required',
            // 'tables.*.id' => 'required|string', //TODO na men en string
            'tables.*.table_no' => 'required|numeric|min:1',
            'tables.*.capacity' =>   'required|numeric|min:2'

        ]);


        $user2->floorPlan->json = $validatedData['floorplan'];
        $user2->floorPlan->save();

         $user2->tables()->createMany($validatedData['tables']);
        //TODO: table number prp nan unique gia kathe user
        //TODO: jina p en exun ID mesto json na tus valw ta id tous afou ta dimiourgiso

        return 'success';
    }
}
