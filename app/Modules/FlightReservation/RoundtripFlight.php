<?php

namespace App\Modules\FlightReservation;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Modules\Others\Package;


class RoundtripFlight extends Model
{
    protected $table = 'roundtrip_flights';

    protected $fillable = [
        'vuelo_ida_id',
        'vuelo_vuelta_id',
        'precio_economy',
        'precio_bussiness',
        'precio_premium',
    ];

    public function package(){
    	return $this->hasMany(Package::class);
    }

    public function vueloIda()
    {
        return $this->belongsTo(Flight::class, 'vuelo_ida_id');
    }
    public function vueloVuelta()
    {
        return $this->belongsTo(Flight::class, 'vuelo_vuelta_id');
    }
    public function tipoCabina($precio)
    {
        if($this->precio_economy == $precio)
        {
            return "economy";
        }
        else if($this->precio_bussiness == $precio)
        {
            return "bussiness";
        }
        else if($this->precio_premium == $precio)
        {
            return "premium";
        }
        return null;
    }
    public static function buscarVuelosIdaVuelta($params)
    {
        /** Premium */
        $parametrosIda = [
            'origen' => $params['origen'],
            'destino' => $params['destino'],
            'fechaida' => $params['fechaida2'],
            'pasajeros' => $params['pasajeros'],
            'cabina' => $params['cabina'],
        ];
        $parametrosVuelta = [
            'origen' => $params['destino'],
            'destino' => $params['origen'],
            'fechaida' => $params['fechavuelta'],
            'pasajeros' => $params['pasajeros'],
            'cabina' => $params['cabina'],
        ];
        $vuelosIda = Flight::buscarVuelos($parametrosIda);
        $vuelosVuelta = Flight::buscarVuelos($parametrosVuelta);
        //dump($vuelosIda);
        //dump($vuelosVuelta);
        $vuelosIdaVuelta = [];
        if(count($vuelosIda) > 0 and count($vuelosVuelta) > 0) {

            foreach ($vuelosIda as $vueloIda) {

                foreach ($vuelosVuelta as $vueloVuelta) {

                    $vuelosIdaVuelta[] =  RoundtripFlight::create([
                                            'vuelo_ida_id' => $vueloIda->id,
                                            'vuelo_vuelta_id' => $vueloVuelta->id,
                                            'precio_economy' => $vueloIda->precio_economy + $vueloVuelta->precio_economy,
                                            'precio_bussiness' => $vueloIda->precio_bussiness + $vueloVuelta->precio_bussiness,
                                            'precio_premium' => $vueloIda->precio_premium + $vueloVuelta->precio_premium,
                                          ]);

                }
            }
        }
        return $vuelosIdaVuelta;
    }
}
