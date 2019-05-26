<?php

namespace App\Modules\FlightReservation;

use Illuminate\Database\Eloquent\Model;

class CheckIn extends Model
{
    protected $table = 'check_ins';

    protected $seat_id;
    protected $user_id;
    protected $fecha;
    protected $estado;

    protected $fillable = [
        'seat_id',
        'user_id',
        'source',
    ];

    /* Relaciones */

	public function user(){
    	return $this->belongsTo(User::class);
	}
    
    public function seat(){
    	return $this->belongsTo(Seat::class);
	}
}
