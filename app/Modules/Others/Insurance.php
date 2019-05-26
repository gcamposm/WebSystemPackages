<?php

namespace App\Modules\Others;

use Illuminate\Database\Eloquent\Model;
use App\Modules\flightReservation\Flight;
use App\Modules\vehicleReservation\Zone;

class Insurance extends Model
{
    protected $table = 'insurances';

    protected $flight_id;
    protected $insurance_reservation_id;
    protected $zone_id;
    protected $medicalService;
    protected $service2;
    protected $service3;
    protected $active;
    protected $groupsize;
    protected $avgage;
    protected $price;
    
    protected $fillable = [
        'flight_id',
        'insurance_reservation_id',
        'zone_id',
        'medicalService',
        'service2',
        'service3',
        'active',
        'groupsize',
        'avgage',
        'price',
    ];

    /* Relaciones */

    public function flight(){
    	return $this->belongsTo(Flight::class);
    }

    public function zone(){
    	return $this->belongsTo(Zone::class);
    }

    public function insuranceReservation(){
    	return $this->hasMany(InsuranceReservation::class);
    }
}
