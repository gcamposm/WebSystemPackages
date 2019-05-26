<?php

namespace App\Modules\VehicleReservation;

use Illuminate\Database\Eloquent\Model;

class VehicleCalendary extends Model
{
    protected $table = 'vehicle_calendaries';

    protected $ano;
    protected $mes;
    protected $dia;

    protected $fillable = [
        'año',
        'mes',
        'dia',
    ];

    /* Relaciones */

    public function vehicle()
    {
      return $this->hasMany(Vehicle::class);
    }
}
