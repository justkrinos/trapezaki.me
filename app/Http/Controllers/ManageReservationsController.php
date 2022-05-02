<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cancellation;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User3;


class ManageReservationsController extends Controller
{
    function show()
    {
        if (request()->has('date')) {
            $attribute = request()->validate(['date' => 'required|date']);
            $date = $attribute['date'];
        }
        else
            $date = date('Y-m-d');

        return view('business.manage-resv', [
            'date' => $date
        ]);
    }

    //TODO: na en me get an en imerominia
    public function modify()
    {
        $validatedData = request()->validate([
            'reason'         => 'required',
            'reservation_id' =>  'required|numeric',
        ]);

        //get the authenticated user and reservation
        $user2 = Auth::guard('user2')->user();
        $reservation = Reservation::find($validatedData['reservation_id']);
        $user3 = User3::find($reservation->user3_id);

        //make sure its on a table that its owned by the u2
        if ($reservation->table->user2_id  == $user2->id) {
            if(str_ends_with(env('APP_URL'),'.me')) //stelni email mono o server oi sto local
                        Mail::to($user3->email)->queue(new \App\Mail\MailCancelledReservation
                                                    ($user3->email, Reservation::find($validatedData['reservation_id']), 
                                                    $validatedData['reason']));
                                                    
            Cancellation::create($validatedData);
            return back()->with('success', 'The reservation has been cancelled!');
        }

        //back to the page p itan prin
        return back()->with('success', 'Oops! Something went wrong');

        // TODO: an to reservation en cancelled, tote na men eshi epilogi cancel
        //       na men afinei 2o cancellation (primary key to reservation_id sto cancellations)
        //       na ginei j sto rating tuto
    }

    public function changeAttendance()
    {

        //validate the request data
        $validatedData = request()->validate([
            'attendance'         => 'required|numeric|min:0',
            'reservation_id' =>  'required|numeric|min:0',
        ]);


        //get the authenticated user and reservation
        $user2 = Auth::guard('user2')->user();
        $reservation = Reservation::find($validatedData['reservation_id']);

        //parse the today's date to a carbon object for ease of comparison
        $resvDate = Carbon::parse($reservation->date)->startOfDay();

        //make sure its on a table that its owned by the u2
        //make sure to attendance ennen megalitero tu arithmou twn atomwn
        //make sure oti to reservation ennen cancelled
        //make sure oti mono ta simerina reservations borei na allaksei
        if (
            $reservation->table->user2_id  == $user2->id
            && $validatedData['attendance'] <= $reservation->pax
            && !$reservation->cancelled
            && $resvDate->isToday('Europe/Athens')
        ) {
            //set the attendance, save and return success
            $reservation->attended = $validatedData['attendance'];
            $reservation->save();
            return "success";
        }

        //back to the page if an error occurs (it shouldnt)
        return response()->json(['error'], 422);
    }
}
