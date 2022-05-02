<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Reservation;
use App\Models\User3;
use App\Models\Table;

class MailCreatedReservation extends Mailable
{
    use Queueable, SerializesModels;

    public $reservation_id;
    public $business_name;
    public $date;
    public $time;
    public $details;
    public $pax;
    public $username;
    public $table;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, Reservation $reservation, $business_name)
    {
        // TODO: change this to https when ssl works
        $this-> business_name = $business_name;
        $this-> date = $reservation->date;
        $this-> time = $reservation->time;
        $this-> details = $reservation->details;
        $this-> pax = $reservation->pax;
        $this-> reservation_id = $reservation->id;
        $user3 = User3::find($reservation->user3_id);
        if($user3->guest==1)
        {
            $this-> username = $user3->full_name;
        }
        else
        {
            $this-> username = $user3->username;
        }
        $this-> table = Table::find($reservation->table_id)->table_no;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Trapezaki Reservation booked!")->view('emails.newresv');
    }
}
