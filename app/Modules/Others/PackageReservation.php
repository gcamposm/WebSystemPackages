<?php

namespace App\Modules\Others;

use Illuminate\Database\Eloquent\Model;
use App\Modules\Others\Package;

class PackageReservation extends Model
{
    protected $table = 'package_reservations';

    protected $fillable = [
        'sell_id',
        'package_id',
        'monto_total',
    ];

    /* Relaciones */

    public function sell(){
    	return $this->belongsTo(Sell::class);
    }

    public function package(){
    	return $this->belongsTo(Package::class, 'package_id');
    }
}
