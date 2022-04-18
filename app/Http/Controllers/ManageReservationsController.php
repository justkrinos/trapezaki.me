<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageReservationsController extends Controller
{
    function show()
    {
        return view('business.manage-resv', [
            'date' => date('Y-m-d'),
        ]);
    }

    public function dailyReservations(request $request)
    {
        $attribute = request()->validate([
            'date' => 'required|date',
        ]);

        return view('business.manage-resv', [
            'date' => $attribute['date'],
        ]);
    }

}
