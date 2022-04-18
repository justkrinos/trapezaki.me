<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
//Function to create time in minutes and string
class Time extends Controller
{
    private int $intTime;
    private string $strTime;
    private int $intMin;
    private int $intHour;

    public function __construct(string $t){
        $this->setTime($t);
    }

    public static function createFromInt(int $t){
        $obj = new Time("00:00");
        $obj->setHour(intdiv($t, 60));
        $obj->setMinutes($t - $obj->getHour()*60);

        $time = Carbon::now();
        $time->setHour(intdiv($t, 60));
        $time->setMinutes($t - $obj->getHour()*60);

        $obj->setTimeInt($t);
        
        $obj->setStrTime($time->format('H:i'));

        return $obj;
    }

    public function setTime(string $t){
        $arr = explode(":",$t);
        if (count($arr) == 2 || count($arr) == 3){
            $this->intTime = $arr[0]*60 + $arr[1];
            $this->strTime = $t;

            $this->intMin = $arr[1];
            $this->intHour = $arr[0];
        }else{
            $this->intTime = 0;
            $this->strTime= "";
        }
    }

    public function setHour(int $h){
        if($h>0 && $h<24){
            $this->intHour = $h;
        }else{
            $this->intHour = 0;
        }
        
    }

    public function setMinutes(int $m){
        if($m>0 && $m<60){
            $this->intMin= $m;
        }else{
            $this->intMin = 0;
        }
    }

    public function getHour(){
        return $this->intHour;
    }

    public function setStrTime(string $t){
        $this->strTime = $t;        
    }

    public function get(){
        return $this->intTime;
    }

    public function setTimeInt(int $t){
        $this->intTime = $t;
    }

    public function round30(){
        if($this->intMin > 30){
            $this->intMin = 0;
            $this->intHour++;
        }elseif($this->intMin < 30 && $this->intMin != 0){
            $this->intMin = 30;
        }

        $time = Carbon::now();
        $time->setHour($this->intHour);
        $time->setMinutes($this->intMin);

        $this->setTimeInt($this->intMin + $this->intHour*60);
        
        $this->setStrTime($time->format('H:i'));

        return $this;
    }

    public function __toString()
    {
        return $this->strTime;
    }

    public function getStr()
    {
        return $this->strTime;
    }
}
