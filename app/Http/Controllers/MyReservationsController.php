<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Time;
use App\Models\Cancellation;
use App\Models\Rating;

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
            if($date->lt($nowDate) || $reservation->cancelled)
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

    public function modify(){
        if(request()->has('cancel')){
        $validatedData = request()->validate([
            'reason' => 'required',
            'reservation_id' =>  'required|numeric'
        ]);

        //get the authenticated user
        $user3 = Auth::guard('user3')->user();

        //an iparxei to reservation ston current user
        if($user3->reservations->find($validatedData['reservation_id'])){
            Cancellation::create($validatedData);
            return back()->with('success','The reservation has been cancelled!');
        }
        
        //back to the page p itan prin
        return back()->with('success','Oops! Something went wrong');
        }

        else if(request()->has('rate')){
            $validatedData = request()->validate([
                'rating' => 'required|numeric',
                'reservation_id' =>  'required|numeric'
            ]);
    
            //get the authenticated user
            $user3 = Auth::guard('user3')->user();

            //an iparxei to reservation ston current user
            if($user3->reservations->find($validatedData['reservation_id'])){
                Rating::create($validatedData);
                return 'success';
            }else{
                return response()->json([], 422);

            }
            
        }
    }
}