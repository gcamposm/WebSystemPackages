<?php

namespace App\Modules\HousingReservation;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Others\Package;

class Hotel extends Model
{
    protected $table = 'hotels';
	

    protected $fillable = [
    	'nombre',
    	'ciudad_id',
        'pais',
    	'ciudad',
    	'direccion',
    	'estrellas',
    	'valoracion',
    	'capacidad'
	];
	
	/* Relaciones */

	public function hotelRoom(){
    	return $this->hasMany(HotelRoom::class);
	}

	public function package(){
    	return $this->hasMany(Package::class);
	}

	public function city(){
    	return $this->belongsTo(Cities::class);
    }
}