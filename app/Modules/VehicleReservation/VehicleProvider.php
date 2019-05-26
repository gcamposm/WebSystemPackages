<?php

namespace App\Modules\VehicleReservation;

use Illuminate\Database\Eloquent\Model;

class VehicleProvider extends Model
{
    protected $table = 'vehicle_providers';

    protected $politica_combustible;
    protected $calificacion;
    protected $kilometraje;
    protected $documentacion_necesaria;
    protected $franquicia_daños;
    protected $deposito_seguridad;

    protected $fillable = [
        'politica_combustible',
        'calificacion',
        'kilometraje',
        'documentacion_necesaria',
        'franquicia_daños',
        'deposito_seguridad',
    ];

    /* Relaciones */

    public function vehicle(){
    	return $this->hasMany(Vehicle::class);
    }
}
