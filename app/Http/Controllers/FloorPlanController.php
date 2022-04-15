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
        if(request()->has('save')){
        $validatedData = request()->validate([
            'floorplan' => 'required',
            'tables'    => 'required|array|min:1',
            'tables.*'  => 'required',
            'tables.*.id' => 'required|string', //TODO na men en string
            'tables.*.table_no' => 'required|numeric|min:1',
            'tables.*.capacity' =>   'required|numeric|min:2|max:16'

        ]);

        
        
        $user2->floorPlan->json = $validatedData['floorplan'];
        $user2->floorPlan->save();

        //STA TABLES PU EN THA EXUN ID J ENNA PIASUN ID PRP NA TO KAMW
        //MESA STON CONTROLLER NA TA DIA STO JSON FLOOR PLAN NA TA KAMI SAVE STO DB
        //J MOLIS KAMW SAVE NA KAMNW REINITIALIZE TO FLOORPLAN STO VIEW GIA NA MPENNUN TA IDS

        foreach($validatedData['tables'] as $table){
            $user2->tables()->updateOrCreate(
                ['id' => $table['id']],
                $table
            );
        }
        
        //TODO: table number prp nan unique gia kathe user
        //TODO: jina p en exun ID mesto json na tus valw ta id tous afou ta dimiourgiso

        return 'success';
        }

        else if(request()->has('getId')){

            $validatedData = request()->validate([
               'table_no' => 'required|numeric|min:1',
                'capacity' =>'required|numeric|min:2|max:16'
            ]);

            $table = $user2->tables()->create($validatedData);

            return $table->id;
        }


    }
}
