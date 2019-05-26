<?php

namespace App\Modules\FlightReservation;

use Illuminate\Database\Eloquent\Model;

class FlightReservation extends Model
{
    protected $table = 'flight_reservations';

    protected $flight_id;
    protected $fecha;
    protected $tipo;
    protected $precio;

    protected $fillable = [
        'flight_id',
        'fecha',
        'tipo',
        'precio',
    ];

    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }
}
