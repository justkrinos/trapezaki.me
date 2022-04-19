<?php

namespace App\Http\Controllers;
use App\Models\User2;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Time;

class TimeSlotController extends Controller
{
    
    
    public function getTimeSlots(User2 $user2){
        $validatedData = request()->validate([
            'date' => 'required|date',
            'table_id' => 'required|numeric'
        ]);
        
        $day_id = $this->getDay($validatedData['date']);
        
        $table = $validatedData['table_id'];

        $settings = $user2->dailySettings()->where('day_id',$day_id)->first();

        $min = Time::createFromInt($settings->time_min);
        $max = Time::createFromInt($settings->time_max);

        $min->round30();
        $max->round30();

        $timeSlots = [];

        for( $i = $min->get(); $i<=$max->get(); $i+=30 ){
            $time = Time::createFromInt($i);
            array_push($timeSlots, $time->get());
        }

        $duration = ($user2->duration) / 30;

        $reservations = $user2->tables()->where('id',$table)->first()->reservations->where('date',$validatedData['date']);
        
        
        foreach($reservations as $reservation)
        {
            // $reservation  = $reservations[1];
            $resvTime = (new Time($reservation->time))->get();
            $index = array_search($resvTime, $timeSlots);
            if($index !== false)
                for($i=$index; $i<($duration + $index); $i++){
                    if(array_key_exists($i,$timeSlots))
                        unset($timeSlots[$i]);
                }
        }

        $timeSlotsStr = [];

        foreach($timeSlots as $timeSlot){
            array_push($timeSlotsStr,(Time::createFromInt($timeSlot))->getStr());
        }

        return $timeSlotsStr;
    }


    private function getDay(string $date){
        $day = Carbon::parse($date)->format('l');

        switch ($day){
            case 'Monday':
                return 1;
            case 'Tuesday':
                return 2;
            case 'Wednesday':
                return 3;
            case 'Thursday':
                return 4;
            case 'Friday':
                return 5;
            case 'Saturday':
                return 6;
            case 'Sunday':
                return 7;
        }
        
    }

}
