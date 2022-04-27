<?php

namespace App\Http\Controllers;
use App\Models\User2;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Collection;

class SearchController extends Controller
{
    public function index()
    {
        $businesses = User2::latest();
        //An ginei search   
        if(request("search"))
        {

            //TODO: validation
            //Getting form variables
            $type = "";
            $city = "";
            $search = request("search");
            $people = request("people");
            $date = request("date");
            $city = request("city");
            $tagsSearch = explode(" ", $search);
            $tagsQuery = "";

            foreach($tagsSearch as $key=>$tag){
                if($key == 0){
                    $tagsQuery .= " tags.name like '" . $tag . "' ";
                }else
                $tagsQuery .= "or tags.name like '" . $tag . "' ";
            }
            
            //Getting type
            if(request("coffee"))
            {
                $type .= "coffee";
            }
            if(request("food"))
            {
                if($type != "")
                {
                    $type .= ":";
                }
                $type .= "food";
            }
            if(request("drinks"))
            {
                if($type != "")
                {
                    $type .= ":";
                }
                $type .= ":drinks";
            }
        //Main query
        $results = DB::select(" SELECT user2s.id, user2s.username, user2s.password, user2s.business_name, 
                                    user2s.company_name, user2s.email, user2s.phone, user2s.representative, 
                                    user2s.city, user2s.address, user2s.postal, user2s.long, user2s.lat, 
                                    user2s.type, user2s.status, user2s.res_range, user2s.duration, user2s.menu, 
                                    user2s.description, user2s.verification_code, user2s.is_verified, user2s.remember_token, 
                                    user2s.created_at, user2s.updated_at
                                FROM user2s join tables join tags join user2tags
                                WHERE user2s.id = tables.user2_id AND taggable_id = user2s.id AND 
                                    user2tags.tag_id = tags.tag_id 
                                    AND capacity >= '$people'
                                    AND city LIKE '%$city%' AND type LIKE '%$type%' 
                                    AND (business_name LIKE '%$search%' OR description LIKE '%$search%'
                                        OR $tagsQuery)
                                GROUP BY user2s.id
                                ORDER BY 
                                    CASE
                                    WHEN business_name LIKE '$search' THEN 1
                                    WHEN business_name LIKE '%$search%' THEN 2
                                    WHEN description LIKE '%$search%' THEN 3
                                    ELSE 4
                                    END
                                    ");

            $businesses = [];
            foreach($results as $result){
                array_push($businesses, new User2((array)$result));
            }

            $businesses =  $this->getAvailableUsers($businesses,$date);

            // dd($businesses);
            return view('www.search',[
                'businesses' => $businesses,
                'everything' => User2::all()
            ]);
            
        }
        return view('www.search');
    }


    public function getAvailableUsers(array $users2, string $date){

        $usersAvailability = collect();
        foreach ($users2 as $user2) {
            $checkTable = true;
            foreach($user2->tables as $table){
                if(!$this->getAvailability($user2, $table->id, $date)){
                    $checkTable = false;
                    break;
                }          
            }
            if($checkTable)
                $usersAvailability->push($user2);       
    
        }

        return $usersAvailability;
        
    }

    public function getAvailability(User2 $user2, int $t, string $d)
    {

        //parse the given date
        $date = Carbon::parse($d);

        if ($date->isToday('Europe/Athens')) {
            //find the current time in minutes to exclude from time slots
            $currentTimeString = Carbon::now('Europe/Athens')->format("H:i");
            $currentTimeInt = (new Time($currentTimeString))->get();
        }
        elseif($date->isPast('Europe/Athens')){
            //no time slots for past date
            return false;
        }
        else{
            //the date is in the future so current time doesnt matter
            $currentTimeInt = -1;
        }


        //get the day id gia na to valw stin database
        $day_id = $this->getDay($d);

        //get the table id
        $table = $t;

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

        $table = $user2->tables()->where('id', $table)->first();

        if(!$table) return false;

        //find the reservations gia tunto table se tunti imerominia
        $reservations = $table->reservations->where('date', $d);


        //remove the time slots pu en kratimena
        foreach ($reservations as $reservation) {

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

        if($timeSlots)
            return true;
        else
            return false;
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
