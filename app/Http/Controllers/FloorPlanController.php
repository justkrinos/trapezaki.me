<?php

namespace App\Http\Controllers;
use App\Models\User2;
use Illuminate\Http\Request;

class FloorPlanController extends Controller
{
    function show(User2 $user2){
        return view('admin.floorplan-editor', [
            'user2' => $user2
        ]);
    }

    function getFloorPlanJson(User2 $user2){
        return $user2->floorPlan->json;
    }

    function modify(User2 $user2){
        $validatedData = request()->validate([
            'floorplan' => 'required'
        ]);

        $user2->floorPlan->json = $validatedData['floorplan'];
        $user2->floorPlan->save();

        return 'success';
    }
}
