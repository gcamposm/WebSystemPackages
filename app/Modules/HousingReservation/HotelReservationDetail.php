<?php

namespace App\Modules\HousingReservation;

use Illuminate\Database\Eloquent\Model;

class HotelReservationDetail extends Model
{
    protected $table = 'hotel_reservation_details';
	
	protected $hotel_reservation_id;
    protected $hotel_room_id;
    // protected $private_housing_id;
    protected $fecha_ingreso;
    protected $fecha_egreso;
	protected $precio;
	protected $tipo;
	

    protected $fillable = [
	    'hotel_reservation_id',
	    'hotel_room_id',
	    // 'private_housing_id',
	    'fecha_ingreso',
	    'fecha_egreso',
	    'precio',
	    'tipo',
	];
	
	/* Relaciones */
	
	public function hotelReservation(){
    	return $this->belongsTo(hotelReservation::class);
	}

	public function hotelRoom(){
    	return $this->belongsTo(hotelRoom::class);
	}

	public function privateHousing(){
    	return $this->belongsTo(PrivateHousing::class);
    }
}
