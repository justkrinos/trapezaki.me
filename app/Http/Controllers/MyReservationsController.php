<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Time;

class MyReservationsController extends Controller
{
    public function show() {

        //Get user
        $user3 = Auth::guard('user3')->user();

        $pastReservations = [];
        $upcomingReservations = [];

        foreach($user3->reservations as $reservation){

            //Get date and time tu resv
            $time = new Time($reservation->time);
            $date = Carbon::create($reservation->date);

            //Get date and time twra
            $nowDate = Carbon::now()->setTime(0,0,0);
            $nowTime = new Time(Carbon::now()->format('H:i'));

            //Check an eperase i wra/mera tu resv j varto sto analogo table
            if($date->lt($nowDate))
                array_push($pastReservations,$reservation);
            else if($date->eq($nowDate) && ($time->get() < $nowTime->get()))
                array_push($pastReservations,$reservation);
            else
                array_push($upcomingReservations,$reservation);
        };


        return view('www.reservations',[
            'user3' => $user3,
            'pastReservations' => $pastReservations,
            'upcomingReservations' => $upcomingReservations
        ]);
    }
}
