<?php

namespace App\Http\Controllers;

//Function to create time in minutes and string
class Time extends Controller
{
    private int $intTime;
    private string $strTime;

    public function __construct(string $t){
        $this->setTime($t);
    }

    public function setTime(string $t){
        $arr = explode(":",$t,2);
        if (count($arr) == 2){
            $this->intTime = $arr[0]*60 + $arr[1];
            $this->strTime = $t;
        }else{
            $this->intTime = 0;
            $this->strTime= "";
        }
    }

    public function get(){
        return $this->intTime;
    }

    public function __toString()
    {
        return $this->strTime;
    }
}
