<?php

namespace App\Modules\HousingReservation;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';
	
	protected $private_housing_id;
    protected $piso;
    protected $numero;
    protected $camas;

    protected $fillable = [
    	'private_housing_id',
    	'piso',
    	'numero',
    	'camas'
	];
	
	/* Relaciones */

	public function privateHousing(){
    	return $this->belongsTo(PrivateHousing::class);
    }
}
