<?php

namespace App\Modules\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Modules\FlightReservation\FlightSellDetail;
use App\Modules\VehiculeReservation\VehicleSellDetail;
use App\Modules\HousingReservation\HousingSellDetail;

class ConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $sell_id;
    public $pdfpath;

    public function __construct($sell_id, $pdfpath)
    {
        $this->sell_id = $sell_id;
        $this->pdfpath = $pdfpath;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $sell_id = $this->sell_id;
        $pdfpath = $this->pdfpath;

        $flight_sell_details = FlightSellDetail::where('sell_id', $sell_id)->get();
        // $vehicles_sell_details = Vehicle::where('sell_id', $sell_id)->get();
        return $this->view('modules.others.mail.confirmationMail', 
            compact(
                'sell_id',
                'flight_sell_details',
                // 'vehicles_sell_details',
                ))->subject('Confirmación de reserva exitosa')->attach($pdfpath);
    }
}
