<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cancellation;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;


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
}
