<?php

namespace App\Http\Controllers;

use App\Models\User2;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Format;

class SearchController extends Controller
{
    public function show()
    {
        //An ginei search
        if (request()->has("btn-search")) {

            //Getting form variables
            $validatedData = request()->validate([
                'search' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
            ]);

            $type = "";
            $city = "";
            $search = request("search");
            $people = request("people");
            $date = request("date");
            $city = request("city");
            $tagsSearch = explode(" ", $search);
            $tagsQuery = "";

            foreach ($tagsSearch as $key => $tag) {
                if ($key == 0) {
                    $tagsQuery .= " tags.name like '" . $tag . "' ";
                } else
                    $tagsQuery .= "or tags.name like '" . $tag . "' ";
            }

            //Getting type
            if (request("coffee")) {
                $type .= "coffee";
            }
            if (request("food")) {
                if ($type != "") {
                    $type .= ":";
                }
                $type .= "food";
            }
            if (request("drinks")) {
                if ($type != "") {
                    $type .= ":";
                }
                $type .= ":drinks";
            }
            //Main query
            $results = DB::select("SELECT user2s.id, user2s.username, user2s.password, user2s.business_name,
                                    user2s.company_name, user2s.email, user2s.phone, user2s.representative,
                                    user2s.city, user2s.address, user2s.postal, user2s.long, user2s.lat,
                                    user2s.type, user2s.status, user2s.res_range, user2s.duration, user2s.menu,
                                    user2s.description, user2s.verification_code, user2s.is_verified,
                                    user2s.remember_token, user2s.created_at, user2s.updated_at
                                FROM user2s join tables join tags join user2tags
                                WHERE user2s.id = tables.user2_id AND taggable_id = user2s.id AND
                                    user2tags.tag_id = tags.tag_id
                                    AND capacity >= '$people'
                                    AND city LIKE '%$city%' AND type LIKE '%$type%'
                                    AND (business_name LIKE '%$search%' OR description LIKE '%$search%'
                                        OR $tagsQuery)
                                    AND user2s.status = 1
                                    AND user2s.is_verified = 1
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
            foreach ($results as $result) {
                array_push($businesses, new User2((array)$result));
            }

            $businesses =  $this->getAvailableUsers($businesses, $date);

            session([
                'people' => $people,
                'date' => $date
            ]);

            // dd($businesses);
            return view('www.search', [
                'businesses' => $businesses
            ]);

            //An den ginei search
        } else {

            //get random users
            $randomUsers = User2::inRandomOrder()
                ->limit(5)
                ->where('is_verified', 1)
                ->where('status', 1)
                ->get();
            //ddd($randomUsers);
            return view('www.search', [
                'users' => $randomUsers
            ]);
        }
    }

    public function showProfile(User2 $user2)
    {
        return view(
            'www.selected-profile',
            [
                'user2' => $user2
            ]
        );
    }

    private function getAvailableUsers(array $users2, string $date)
    {

        $usersAvailability = collect();
        foreach ($users2 as $user2) {
            $checkTable = true;
            foreach ($user2->tables as $table) {
                if (!$this->getTableAvailablity($user2, $table->id, $date)) {
                    $checkTable = false;
                    break;
                }
            }
            if ($checkTable)
                $usersAvailability->push($user2);
        }

        return $usersAvailability;
    }

    //TODO Na mpei kapou sta eggrafa
    static public function getAvailableTables(User2 $user2, $date){
        $tablesAvailability = collect();
        $searchController = new SearchController();
        foreach ($user2->tables as $table) {
            if (!$searchController->getTableAvailablity($user2, $table->id, $date)) {
                $tablesAvailability->push($table->id);
            }
        }

        return $tablesAvailability;
    }

    public function getTableAvailablity(User2 $user2, int $t, string $d)
    {
        //parse the given date
        $date = Carbon::parse($d);

        if ($date->isToday('Europe/Athens')) {
            //find the current time in minutes to exclude from time slots
            $currentTimeString = Carbon::now('Europe/Athens')->format("H:i");
            $currentTimeInt = (new Time($currentTimeString))->get();
        } elseif ($date->isPast('Europe/Athens')) {
            //no time slots for past date
            return false;
        } else {
            //the date is in the future so current time doesnt matter
            $currentTimeInt = -1;
        }


        //get the day id gia na to valw stin database
        $day_id = Format::dayInt($d);

        //get the table id
        $table = $t;

        //get the reservation settings
        $settings = $user2->dailySettings()->where('day_id', $day_id)->first();
        $min = Time::createFromInt($settings->time_min);
        $max = Time::createFromInt($settings->time_max);

        //round se misawra ta reservation settings gia na fkennun ta time slots
        $min->roundUp30();

        $max->roundDown30();


        //initialize the time slots from min to max
        $timeSlots = [];
        for ($i = $min->get(); $i <= $max->get(); $i += 30) {

            //exclude osa en prin tin twrasini wra
            if ($i > $currentTimeInt)
                //add to timeslot array
                array_push($timeSlots, $i);
        }

        //tuto ginete sto  manage customer tu admin

        //get the duration se misawra
        $duration = ($user2->duration) / 30;

        $table = $user2->tables()->where('id', $table)->first();

        if (!$table) return false;

        //find the reservations gia tunto table se tunti imerominia
        $reservations = $table->reservations->where('date', $d);


        //remove the time slots pu en kratimena
        foreach ($reservations as $reservation) {

            //skip if cancelled
            if ($reservation->cancelled)
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

        if ($timeSlots)
            return true;
        else
            return false;
    }

    // public function changeCity()
    // {
    //     $validatedData = request()->validate([
    //         'city' => "required|in:Limassol,Larnaca,Paphos,Famagusta,Nicosia"
    //     ]);

    //     $user3 = Auth::guard('user3')->user();

    //     if ($user3) {
    //         $user3->city = $validatedData['city'];
    //         $user3->save();
    //     } else {
    //         session(['city' => $validatedData['city']]);
    //     }

    //     return 'success';
    // }
}
