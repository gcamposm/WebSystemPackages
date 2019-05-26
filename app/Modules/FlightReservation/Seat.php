<?php

namespace App\Modules\FlightReservation;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $table = 'seats';

    // protected $avion_id;
    

    protected $fillable = [
        'flight_detail_id',
        'user_id',
        'numero',
        'letra',
        'tipo',
        'disponible',
        
    ];

    /* Relaciones */

    public function tramo()
    {
        return $this->belongsTo(FlightDetail::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function check_in(){
    	return $this->hasMany(CheckIn::class);
	}
	public static function ocupar($asientos, $cantidad, $user_id, $source)
    {
        //dump(":D");
        $validador = 0;
        $contador = 0;
        foreach ($asientos as $asiento)
        {
            //dump($asiento->disponible);
            if($asiento->disponible == true)
            {
                $contador = $contador + 1;
            }

        }
        //dump($cantidad);
        //dump($contador);
        if($contador >= $cantidad)
        {
            foreach ($asientos as $asiento)
            {
                if($asiento->disponible == true and $cantidad > 0)
                {
                    //verificar si hay asientos disponibles para todos
                    //$validador = $validador + 1;
                    $asiento->disponible = false;
                    $asiento->user_id = $user_id;
                    $asiento->save();
                    $cantidad = $cantidad - 1;
                    //dump($asiento);
                    CheckIn::create([
                        'seat_id' => $asiento->id,
                        'user_id'=> $user_id,
                        'source' => $source,
            ]);
                }
            }
            return true;
        }
        else{
            return false;
        }

    }
}
