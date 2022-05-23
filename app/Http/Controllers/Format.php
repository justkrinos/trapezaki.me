<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class Format
{
    public static function formatType(array $validatedData){
        //Kamni ta tis morfis coffee:food:drinks gia osa iparxun
        //etsi wste na borume na ta kamume extract later

        $stringToMake = ""; //to string pu ena stilume pisw
        $dataToChange = ['coffee','food','drinks']; //jina p ena checkarume



        foreach ($dataToChange as $type) { //gia kathe ena p jina p ena checkarume
            if (array_key_exists($type,$validatedData)){ //an iparxi
                if (empty($stringToMake))
                    $stringToMake .= $type; //men tu valis : an akoma en ofkero
                else
                    $stringToMake .= ':' . $type; //vartu : afu empike idi ena mesto array
            }
            //diagrafw ta data pu mesa gt thelw mono to (type => food:coffee klp)
            unset($validatedData[$type]);
        }

        //vallw tu to string p ekama p en ulla mesa
        $validatedData['type'] = $stringToMake;

        //diw to pisw sto function pu to kalese
        return $validatedData;
    }

    public static function tagsToArray(string $tags){
        //Asxolithu mono an dennen ofkero, alios aisto na fkalei error sto view
        if (!empty($tags)) {
            //En xwrismena se komma, ara kamnw ta se array
            $tags = explode(',', $tags);

            //To polli 10 tags na mpennun alliws na men mpennei tpt
            if(count($tags) > 10)
                $tags = [];
        }
        //Stelnw pisw  to array p ekama
        //gia na to valw mesto request mou gia na ginei to validate
        return $tags;
    }

    public static function dayInt(string $date)
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
