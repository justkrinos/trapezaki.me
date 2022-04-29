<?php

namespace App\Http\Controllers;

use App\Models\User2;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Time;
use App\Models\Reservation;

class TimeSlotController extends Controller
{

    //TODO: mesa sto booking controller prp na checkarume an
    //to epilegmeno time slot en mesa sta available time slots me tinidia logiki opos dame\
    //BUT an en modify prp na men lamvani ipopsi to idio

    public function getTimeSlots(User2 $user2)
    {

        $validatedData = request()->validate([
            'date' => 'required|date|after:yesterday',
            'table_id' => 'required|numeric|exists:tables,id'
        ]);

        //parse the given date
        $date = Carbon::parse($validatedData['date']);

        //check the date to prepare for time slots
        //if date en avrio skip hour check
        //if date en extes return empty array
        if ($date->isToday('Europe/Athens')) {
            //find the current time in minutes to exclude from time slots
            $currentTimeString = Carbon::now('Europe/Athens')->format("H:i");
            $currentTimeInt = (new Time($currentTimeString))->get();
        }
        elseif($date->isPast('Europe/Athens')){
            //no time slots for past date
            return [];
        }
        else{
            //the date is in the future so current time doesnt matter
            $currentTimeInt = -1;
        }


        //get the day id gia na to valw stin database
        $day_id = $this->getDay($validatedData['date']);

        //get the table id
        $table = $validatedData['table_id'];

        //get the reservation settings
        $settings = $user2->dailySettings()->where('day_id', $day_id)->first();
        $min = Time::createFromInt($settings->time_min);
        $max = Time::createFromInt($settings->time_max);

        //round se misawra ta reservation settings gia na fkennun ta time slots
        $min->round30();

        //TODO: nan rounddown gia to max j roundup gia to min
        $max->round30();


        //initialize the time slots from min to max
        $timeSlots = [];
        for ($i = $min->get(); $i <= $max->get(); $i += 30) {

            //exclude osa en prin tin twrasini wra
            if ($i > $currentTimeInt)
                //add to timeslot array
                array_push($timeSlots, $i);
        }

        //TODO: to duration nan afstira kommathkiasmeno se misawra otan to kamume na mpennei sto db
        //tuto ginete sto  manage customer tu admin

        //get the duration se misawra
        $duration = ($user2->duration) / 30;

        //find the reservations gia tunto table se tunti imerominia
        $reservations = $user2->tables()->where('id', $table)->first()->reservations->where('date', $validatedData['date']);

        //if i have reservation id, then remove that reservation from the list
        //this is because the id is given only when we are about to  modify the reservation
        $currentResv = null;
        if (request()->has('id')) {
            $validatedId = request()->validate([
                'id' => 'required|numeric|exists:reservations,id'
            ]);

            $currentResv = Reservation::find($validatedId['id']);
        }


        //remove the time slots pu en kratimena
        foreach ($reservations as $reservation) {
            //if we are about to modify a reservation
            //exclude its time slots
            if($reservation == $currentResv)
                continue;

            //skip if cancelled
            if($reservation->cancelled)
                continue;

            //get the reservation time
            $resvTime = (new Time($reservation->time))->get();

            //get the index if exists
            $index = array_search($resvTime, $timeSlots);
            if ($index !== false) //if it exists
                //remove the next time slots pu kalifkei to reservation
                //tuto en analoga me ta misawra tu duration
                //px duration = 1:30 wra tote remove ta epomena 2 slots
                for ($i = $index; $i < ($duration + $index); $i++) {
                    if (array_key_exists($i, $timeSlots))
                        unset($timeSlots[$i]);
                }

            //idia logiki me ta proigumena slots gia na men exun conflict oi kratiseis
            for ($i = $index - 1; $i > ($index - $duration) && $i >= 0; $i--) {
                if (array_key_exists($i, $timeSlots))
                    unset($timeSlots[$i]);
            }
        }

        $timeSlotsStr = [];

        foreach ($timeSlots as $timeSlot) {
            array_push($timeSlotsStr, (Time::createFromInt($timeSlot))->getStr());
        }

        return $timeSlotsStr;
    }

    private function getDay(string $date)
    {
        $day = Carbon::parse($date)->format('l');

        switch ($day) {
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
