<?php

namespace App\Modules\HousingReservation;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Modules\Others\Package;

class HotelRoom extends Model
{
    protected $table = 'hotel_rooms';
	

    protected $fillable = [
    	'hotel_id',
    	'capacidad',
    	'camas',
		'numero',
		'precio'
	];
	
	/* Relaciones */

	public function hotelReservationDetail(){
    	return $this->hasMany(HotelReservationDetail::class);
	}

	public function housingCalendary(){
    	return $this->hasMany(HousingCalendary::class);
	}
	
	public function package(){
    	return $this->hasMany(Package::class);
    }

	public function serviceAndRoom(){
    	return $this->hasMany(ServiceAndRoom::class);
	}
	
	public function hotel(){
    	return $this->belongsTo(Hotel::class, 'hotel_id');
	}
	
	public static function buscarHabitacion($params, $hotel_id)
	{
		$fechaEntrada = Carbon::createFromFormat('Y-m-d', $params['fecha-entrada-housing']);
		$fechaSalida= Carbon::createFromFormat('Y-m-d', $params['fecha-salida-housing']);
		$habitaciones = DB::table('hotel_rooms as rooms')
				->join('hotel_reservations as reservations', 'rooms.id', '=', 'reservations.hotel_room_id')
				->whereDate('reservations.fecha_ingreso', '<=', $fechaEntrada->format('Y-m-d'))
				->whereDate('reservations.fecha_egreso', '>=', $fechaEntrada->format('Y-m-d'))
				->orWhereDate('reservations.fecha_ingreso', '<=', $fechaSalida->format('Y-m-d'))
				->whereDate('reservations.fecha_egreso', '>=', $fechaSalida->format('Y-m-d'))
				->select('rooms.id', 'rooms.capacidad')->get();
		$room_final = [];
		$array_id = [];		
		$hotel_rooms = HotelRoom::all();
		foreach($habitaciones as $habitacion)
		{
			$array_id[] = $habitacion->id;
		}
		$rooms = static::where('hotel_rooms.hotel_id', '=', $hotel_id)
            ->where('capacidad', '>=', $params['personas'])
			->whereNotIn('id', $array_id)->get();
		return $rooms;
	}
}
