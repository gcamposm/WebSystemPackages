<?php

namespace App\Modules\HousingReservation;

use Illuminate\Database\Eloquent\Model;

class HousingCalendary extends Model
{
    protected $table = 'housing_calendaries';
	
	protected $room_id;
    protected $date;
   
    protected $fillable = [
		'room_id',
		'date'
	];
	
	/* Relaciones */

	public function hotelRoom(){
    	return $this->belongsTo(hotelRoom::class);
	}

	public function privateHousing(){
    	return $this->hasMany(PrivateHousing::class);
	}
}
