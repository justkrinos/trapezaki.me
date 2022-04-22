<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cancellation;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class ManageReservationsController extends Controller
{
    function show()
    {
        return view('business.manage-resv', [
            'date' => date('Y-m-d'),
        ]);
    }

    public function modify(request $request)
    {
        //TODO tuta p en if else mesta functions
        //     na ginun ksexorista private functions
        //     j na eshi ena p ena ta dromologei
        //     apla gia na men en terastia
        if (request()->has('date')) {
            $attribute = request()->validate([
                'date' => 'required|date',
            ]);

            return view('business.manage-resv', [
                'date' => $attribute['date'],
            ]);
        }
        elseif(request()->has('reservation_id')){
            $validatedData = request()->validate([
                'reason'         => 'required',
                'reservation_id' =>  'required|numeric',
            ]);

            //get the authenticated user and reservation
            $user2 = Auth::guard('user2')->user();
            $reservation = Reservation::find($validatedData['reservation_id']);

            //make sure its on a table that its owned by the u2
            if($reservation->table->user2_id  == $user2->id){
                Cancellation::create($validatedData);
                return back()->with('success', 'The reservation has been cancelled!');
            }

            //back to the page p itan prin
            return back()->with('success', 'Oops! Something went wrong');

            // TODO: an to reservation en cancelled, tote na men eshi epilogi cancel
            //       na men afinei 2o cancellation (primary key to reservation_id sto cancellations)
            //       na ginei j sto rating tuto
        }
    }

    public function changeAttendance(){
        $validatedData = request()->validate([
            'attendance'         => 'required|numeric|min:0',
            'reservation_id' =>  'required|numeric|min:0',
        ]);

        //get the authenticated user and reservation
        $user2 = Auth::guard('user2')->user();
        $reservation = Reservation::find($validatedData['reservation_id']);

        $resvDate = Carbon::parse($reservation->date)->endOfDay();
        $todayDate = Carbon::now('Europe/Athens')->endOfDay();

        //make sure its on a table that its owned by the u2
        //make sure to attendance ennen megalitero tu arithmou twn atomwn
        //make sure oti to reservation ennen cancelled
        //make sure oti mono ta simerina reservations borei na allaksei
        if($reservation->table->user2_id  == $user2->id
            && $validatedData['attendance'] <= $reservation->pax
            && !$reservation->cancelled
            && $resvDate->eq($todayDate)
        ){
            $reservation->attended = $validatedData['attendance'];
            $reservation->save();
            return "success";
        }

        //back to the page p itan prin
        return response()->json([],422);

        // TODO: an to reservation en cancelled, tote na men eshi epilogi cancel
        //       na men afinei 2o cancellation (primary key to reservation_id sto cancellations)
        //       na ginei j sto rating tuto

    }
}
