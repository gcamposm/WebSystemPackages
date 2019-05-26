<?php

namespace App\Modules\FlightReservation;

use Illuminate\Database\Eloquent\Model;

class OriginDestiny extends Model
{
    protected $table = 'origin_destinies';

    protected $flight_detail_id;
    protected $airport_id;

    protected $fillable = [
        'flight_detail_id',
        'airport_id',
    ];

    /* Relaciones */

	public function flightDetail(){
    	return $this->belongsTo(FlightDetail::class);
	}
    
    public function airport(){
    	return $this->belongsTo(Airport::class);
	}
}
