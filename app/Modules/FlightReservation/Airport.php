<?php

namespace App\Modules\FlightReservation;

use App\Modules\Others\City;
use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $table = 'airports';

    protected $pais;
    protected $ciudad;
    protected $direccion;
    protected $nombre;

    protected $fillable = [
        'ciudad_id',
        'pais',
        'ciudad',
        'direccion',
        'nombre'
    ];

    /* Relaciones */

	public function originDestiny(){
    	return $this->hasMany(OriginDestiny::class);
	}
	public function city(){
	    return $this->belongsTo(City::class);
    }
}
