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
        
        //Checking type
        //ddd(request()->all());
        $type = "";
        $city="";
        $search="";
        
        if(request("food"))
        {
            //$businesses = $businesses->where("type", "like", "%food%");
            $type = "food";
        }
        if(request("coffee"))
        {
            //$businesses = $businesses->where("type", "like","%coffee%");
            $type = "coffee";
        }
        if(request("drinks"))
        {
            //$businesses = $businesses->where("type", "like", "%drinks%");
            $type = "drinks";
        }

        //dd($businesses);

        /*$businesses
                ->where('city', 'like', request("city")); //strict city check*/
        $city = request("city");

        //Checking date
        //TODO

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
            
            if(count($subset)==0){
                return view('www.search',[
                    'businesses' => ""
                ]);
            }

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
            //dd($businesses->get()->all());
            

        if(request("search"))
        {
            $search = request("search");
            //$businesses
              //  ->where('business_name', 'like', '%' . request('search') . '%') //relaxed name check
                //->orWhere('description', 'like', '%' . request('search') . '%') //relaxed description check
               // ;/*->get()
                  //  ->tables
                  //      ->where('capacity', '>=', request("people"));*/
            
            //dd($businesses->get());
        }
        //dd($businesses->get()->all());
        $businesses
                ->where('is_verified', 1)
                ->where('status', 1)
                ->where('city', 'like', '%' . $city . '%') //strict city check
                ->where('type', 'like', '%' . $type . '%') //strict type check
                ->where(function($query){
                    $query->where('business_name', 'like', '%' . request('search') . '%') //relaxed name check
                          ->orWhere('description', 'like', '%' . request('search') . '%') //relaxed description check
                          ->limit(5);
                });
        //dd($businesses->get()->all());
            //$businesses->where("id", 2);
            
            //dd($businesses->get()->all());

        return view('www.search',[
            'businesses' => $businesses->get()
        ]);
    }
}
