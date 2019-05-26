<?php

namespace App\Modules\FlightReservation;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Others\Sell;

class FlightSellDetail extends Model
{
    protected $table = 'flight_sell_details';


    protected $fillable = [
        'sell_id',
        'flight_id',
        'roundtrip_id',
        'precio',
        'descuento',
        'monto_total',
        'tipo',
        'cantidad',
    ];

    /* Relaciones */

    public function flight()
    {
        return $this->belongsTo(Flight::class, 'flight_id');
    }
    public function roundtrip()
    {
        return $this->belongsTo(RoundtripFlight::class, 'roundtrip_id');
    }
    public function sell()
    {
        return $this->belongsTo(Sell::class, 'sell_id');
    }
}
