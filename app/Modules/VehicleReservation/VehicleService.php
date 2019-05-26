<?php

namespace App\Modules\VehicleReservation;

use Illuminate\Database\Eloquent\Model;

class VehicleService extends Model
{
    protected $table = 'vehicle_services';

    protected $nombre_servicio;
    protected $duracion;

    protected $fillable = [
        'nombre_servicio',
        'duracion',
    ];

    /* Relaciones */

    public function serviceAndVehicle(){
    	return $this->hasMany(ServiceAndVehicle::class);
    }

    public function serviceAndProvider(){
    	return $this->hasMany(ServiceAndProvider::class);
    }
}
