<?php

namespace App\Modules\HousingReservation;

use Illuminate\Database\Eloquent\Model;

class HousingService extends Model
{
    protected $table = 'housing_services';
	
	protected $hotel_id;
    protected $nombre;
    protected $precio;
    protected $descripcion;

    protected $fillable = [
    	'hotel_id',
    	'nombre',
    	'precio',
    	'descripcion'
	];
	
	/* Relaciones */

	public function serviceAndRoom(){
    	return $this->hasMany(ServiceAndRoom::class);
	}

	public function housingAndService(){
    	return $this->hasMany(HousingAndService::class);
	} 
}
