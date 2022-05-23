<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Reservation;
use App\Models\User3;
use App\Models\Table;

class MailCancelledReservation extends Mailable
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
    public $reason;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, Reservation $reservation, $reason, $business_name)
    {
        $this-> business_name = $business_name;
        $this-> date = $reservation->date;
        $this-> time = $reservation->time;
        $this-> details = $reservation->details;
        $this-> pax = $reservation->pax;
        $this-> reservation_id = $reservation->id;
        $user3 = $reservation->user3;
        if($user3->guest == 1)
            $this-> username = $user3->full_name;
        else
            $this-> username = $user3->username;
        $this-> table = $reservation->table->table_no;
        $this-> reason = $reason;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("Trapezaki Cancelled Reservation")->view('emails.cancelled');
    }
}
