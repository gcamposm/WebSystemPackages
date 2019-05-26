<?php

namespace App\Modules\VehicleReservation;


use Illuminate\Database\Eloquent\Model;
use App\Modules\Others\Sell;

class VehicleReservation extends Model
{
    protected $table = 'vehicle_reservations';

    protected $fillable = [
        'sell_id',
        'vehicle_id',
        'monto_total',
        'fecha_retiro',
        'fecha_regreso',
    ];

    /* Relaciones */

    public function sell(){
    	return $this->belongsTo(Sell::class);
    }

    public function vehicle(){
    	return $this->belongsTo(Vehicle::class);
    }

    public function vehicleReservationDetail(){
    	return $this->hasMany(VehicleReservationDetail::class);
    }
}
