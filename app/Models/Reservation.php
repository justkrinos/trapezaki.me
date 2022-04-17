<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Reservation extends Model
{
    protected $guarded = [];
    use HasFactory;

    // protected $casts = [
    //     'time' => 'datetime:H:i'
    // ];

    public function user3(){
        return $this->belongsTo('App\Models\User3');
    }

    public function table(){
        return $this->belongsTo('App\Models\Table');
    }

    public function user2(){
        return $this->table()->first()->user2();
    }

    //Otan erkete to time nan se format HH:MM
    public function getTimeAttribute( $value ) {
        return (new Carbon($value))->format('H:i');
    }

    public function cancelled(){
        return $this->hasOne('App\Models\Cancellation');
    }

    public function rating(){
        return $this->hasOne('App\Models\Rating');
    }

    //Otan erkete to time nan se format dd/mm/yyyy
    //doesnt work epd en to dexete etsi to carbon
    // public function getDateAttribute( $value ) {
    //     return (new Carbon($value))->format('d/m/Y');
    // }
}
