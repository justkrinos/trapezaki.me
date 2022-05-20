<?php

namespace App\Http\Controllers;

use App\Models\User2;
use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Http\Controllers\SearchController;


class FloorPlanController extends Controller
{
    public function show(User2 $user2)
    {
        return view('admin.floorplan-editor', [
            'user2' => $user2
        ]);
    }


    public function getFloorPlanJson(User2 $user2)
    {
        //get todays date
        $today = Carbon::now('Europe/Athens')->format('Y-m-d');

        //make the query to get tables that have reservations today or later
        //also check if not cancelled
        $tablesWithReservations =
            Table::where('user2_id', $user2->id)
                ->leftJoin('reservations', 'reservations.table_id', '=', 'tables.id')
                ->leftJoin('cancellations', 'cancellations.reservation_id', '=', 'reservations.id')
                ->select('reservations.date', 'tables.id', 'reservations.table_id', 'cancellations.reason')
                ->whereDate('reservations.date', '>=', $today)
                ->whereNull('cancellations.reason')
                ->select('table_id')
                ->distinct()
                ->get();

        //get the floorplan
        $floorplan = $user2->floorPlan->json;

        if ($floorplan){ //an den en ofkero stilto
            $returnData['floorplan'] = $floorplan;
            $returnData['tablesWithReservations'] = $tablesWithReservations;

            return $returnData;
        }

        else
            return []; //aliws stile ofkero gia na kserei oti en null

        // //OLD CODE
        // if ($user2->floorPlan->json) //an den en ofkero stilto
        //     return $user2->floorPlan->json;
        // else
        //     return []; //aliws stile ofkero gia na kserei oti en null
    }

    public function getFloorPlanJsonU2()
    {
        $user2 = Auth::guard('user2')->user();
        if ($user2->floorPlan->json) //an den en ofkero stilto
            return $user2->floorPlan->json;
        else
            return []; //aliws stile ofkero gia na kserei oti en null
    }

    public function modify(User2 $user2)
    {
        //TODO: en prp na checkari an iparxi resv?
        //      SOLUTION DONE: checkarei to sto front end
        if (request()->has('save')) {
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

            foreach ($validatedData['tables'] as $table) {
                $user2->tables()->updateOrCreate(
                    ['id' => $table['id']],
                    $table
                );
            }

            //TODO: table number prp nan unique gia kathe user
            //TODO: jina p en exun ID mesto json na tus valw ta id tous afou ta dimiourgiso

            return 'success';
        } else if (request()->has('getId')) {

            $validatedData = request()->validate([
                'table_no' => 'required|numeric|min:1',
                'capacity' => 'required|numeric|min:2|max:16'
            ]);

            $table = $user2->tables()->create($validatedData);

            return $table->id;
        }
    }

}
