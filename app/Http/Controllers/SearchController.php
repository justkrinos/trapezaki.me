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

            


            $businesses
                ->where('city', 'like', request("city")) //strict city check
                ->where('business_name', 'like', '%' . request('search') . '%') //relaxed name check
                ->orWhere('description', 'like', '%' . request('search') . '%') //relaxed description check
                ;/*->get()
                    ->tables
                        ->where('capacity', '>=', request("people"));*/
            //Checking people
            
            //query to get tables for the filtered users
            $tables = Table::select("user2_id")
                ->where("capacity", ">=", request("people"))
                ->whereIn("user2_id", $businesses->pluck("id"))->get()->all();
            
            foreach($tables as $table){
                //I will show these businesses, because they have tables with capacity equal or greater than the requested people
                dd($businesses->where("id", $table->user2_id)->get());
            }
            /*    $qualified = array();
            foreach($businesses->get()->all() as $business)
            {
                array_push($qualified, $business->tables->where('capacity', '>=', request("people")));
            }
            dd($qualified);*/
            
        }
        return view('www.search');
    }
}
