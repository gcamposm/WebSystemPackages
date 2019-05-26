<?php

namespace App\Modules\FlightReservation;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';

    protected $nombre;
    protected $direccion;

    protected $fillable = [
        'nombre',
        'direccion',
    ];

    /* Relaciones */

    public function airplane()
    {
        return $this->hasMany(Airplane::class);
    }
}
