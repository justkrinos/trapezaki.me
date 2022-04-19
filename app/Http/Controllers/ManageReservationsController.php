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
                'reason' => 'required',
                'reservation_id' =>  'required|numeric'
            ]);

            return $validatedData;
            //get the authenticated user
            $user2 = Auth::guard('user2')->user();

            //an iparxei to reservation ston current user
            if ($user2->reservations->find($validatedData['reservation_id'])) {
                Cancellation::create($validatedData);
                return back()->with('success', 'The reservation has been cancelled!');
            }
            //back to the page p itan prin
            return back()->with('success', 'Oops! Something went wrong');

        }
    }
}
