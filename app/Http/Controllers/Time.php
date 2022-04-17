<?php

namespace App\Http\Controllers;

//Function to create time in minutes
class Time extends Controller
{
    private int $time;

    public function __construct(string $t){
        $this->setTime($t);
    }

    public function setTime(string $t){
        $arr = explode(":",$t,2);
        if (count($arr) == 2){
            $this->time = $arr[0]*60 + $arr[1];
        }else{
            $this->time = 0;
        }
    }

    public function get(){
        return $this->time;
    }
}
