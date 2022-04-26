<?php

namespace App\Http\Controllers;
use App\Models\User2;
use App\Models\Table;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        $businesses = User2::latest();
        //An ginei search   
        if(request("search"))
        {
            //Checking type
            //ddd(request()->all());
            if(request("food"))
            {
                $businesses->where("type", "like", "%food%");
            }
            if(request("coffee"))
            {
                $businesses->where("type", "like","%coffee%");
            }
            if(request("drinks"))
            {
                $businesses->where("type", "like", "%drinks%");
            }

            //Checking date
            //TODO

            

            //city, name, description
            $businesses
                ->where('city', 'like', request("city")); //strict city check
                
            $businesses
                ->where('business_name', 'like', '%' . request('search') . '%') //relaxed name check
                ->orWhere('description', 'like', '%' . request('search') . '%') //relaxed description check
                ;/*->get()
                    ->tables
                        ->where('capacity', '>=', request("people"));*/
            //Checking people
            
            //query to get tables for the filtered users
            $tables = Table::select("user2_id")
                ->where("capacity", ">=", request("people"))
                ->whereIn("user2_id", $businesses->pluck("id"))->get();

            $subset = $tables->map(function ($table) {
                return $table->only(['user2_id']);
            });

            //dd($subset);
            
            //dd($businesses->get()->all());
            //$businesses->where("id", 2);
            //dd($businesses->get()->all());
            $i=0;
            foreach($subset as $sub)
            {
                //dd($businesses->get()->all());
                if($i==0)
                {
                    $businesses->where("id", $sub);
                }
                else
                {
                    $businesses->orWhere("id", $sub);
                }
                $i++;
                //dd($businesses->get()->all());
            }
            $businesses
                ->limit(5)
                ->where('is_verified', 1)
                ->where('status', 1);
            //$businesses->where("id", 2);
            
            //dd($businesses->get()->all());
            
            return view('www.search',[
                'businesses' => $businesses->get()
            ]);
        }
        return view('www.search');
    }
}
