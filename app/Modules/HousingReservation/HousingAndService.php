<?php

namespace App\Modules\HousingReservation;

use Illuminate\Database\Eloquent\Model;

class HousingAndService extends Model
{
    protected $table = 'housing_and_services';

    protected $housing_service_id;
    protected $private_housing_id;

    protected $fillable = [
	    'housing_service_id',
	    'private_housing_id',
    ];

    /* Relaciones */

    public function housingService(){
    	return $this->belongsTo(HousingService::class);
    }

    public function privateHousing(){
    	return $this->belongsTo(PrivateHousing::class);
    }
}
