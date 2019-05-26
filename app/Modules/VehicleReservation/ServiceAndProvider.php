<?php

namespace App\Modules\VehicleReservation;

use Illuminate\Database\Eloquent\Model;

class ServiceAndProvider extends Model
{
    protected $table = 'service_and_providers';

    protected $vehicle_service_id;
    protected $vehicle_provider_id;

    protected $fillable = [
        'vehicle_service_id',
        'vehicle_provider_id',
    ];

    /* Relaciones */

    public function vehicleService(){
    	return $this->belongsTo(VehicleService::class);
    }

    public function vehicleProvider(){
    	return $this->belongsTo(VehicleProvider::class);
    }
}
