<?php

namespace App\Modules\HousingReservation;

use Illuminate\Database\Eloquent\Model;

class PrivateHousing extends Model
{
    protected $table = 'private_housings';
	
	protected $housing_calendary_id;
    protected $capacidad;
    protected $direccion;
    protected $nombre;
    protected $estrella;
    protected $valoracion;
    protected $pais;

    protected $fillable = [
	    'housing_calendary_id',
	    'capacidad',
	    'direccion',
	    'nombre',
	    'estrella',
	    'valoracion',
	    'pais'
	];
	
	/* Relaciones */

	public function hotelReservationDetail(){
    	return $this->hasMany(HotelReservationDetail::class);
	}

	public function room(){
    	return $this->hasMany(Room::class);
	}

	public function housingAndService(){
    	return $this->hasMany(HousingAndService::class);
	}
	
	public function housingCalendary(){
    	return $this->belongsTo(HousingCalendary::class);
    }
}
