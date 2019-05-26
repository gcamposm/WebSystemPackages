<?php

namespace App\Modules\HousingReservation;

use Illuminate\Database\Eloquent\Model;

class ServiceAndRoom extends Model
{
    protected $table = 'service_and_rooms';

    protected $housing_service_id;
    protected $hotel_room_id;

    protected $fillable = [
    	'housing_service_id',
    	'hotel_room_id',
    ];

    /* Relaciones */

	public function hotelRoom(){
    	return $this->belongsTo(HotelRoom::class);
    }
	
	public function housingService(){
    	return $this->belongsTo(HousingService::class);
    }
}
