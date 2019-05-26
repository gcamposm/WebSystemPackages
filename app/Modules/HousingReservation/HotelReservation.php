<?php

namespace App\Modules\HousingReservation;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Others\Sell;

class HotelReservation extends Model
{
    protected $table = 'hotel_reservations';


    protected $fillable = [
				'sell_id',
				'hotel_room_id',
				'precio',
				'fecha_ingreso',
				'fecha_egreso',
				'cantidad',
				'monto_total',
				'descuento'
	];
	
	/* Relaciones */

	public function hotelReservationDetail(){
    	return $this->hasMany(HotelReservationDetail::class);
	}
	
	public function hotelRoom(){
    	return $this->belongsTo(HotelRoom::class, 'hotel_room_id');
	}

	public function sell(){
			return $this->belongsTo(Sell::class, 'sell_id');
	}
}
