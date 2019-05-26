<?php

namespace App\Modules\FlightReservation;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{

    protected $table = 'flights';


    protected $fillable = [
        'origin_id',
        'destiny_id',
        'tramo1_id',
        'tramo2_id',
        'escalas',
        'fecha_despegue',
        'fecha_aterrizaje',
        'precio_economy',
        'precio_bussiness',
        'precio_premium',
    ];


    public function origin()
    {
        return $this->belongsTo(Airport::class, 'origin_id');
    }
    public function destiny()
    {
        return $this->belongsTo(Airport::class, 'destiny_id');
    }
    public function getTramo1()
    {
        return $this->belongsTo(FlightDetail::class, 'tramo1_id');
    }
    public function getTramo2()
    {
        return $this->belongsTo(FlightDetail::class, 'tramo2_id');
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

    public function descontarAsientos($cabina, $cantidad)
    {
        if($cabina == "economy")
        {
            if($this->escalas == 1)
            {
                $tramo1 = $this->getTramo1;
                $tramo1->asientos_economy = $tramo1->asientos_economy - $cantidad;
                $tramo1->save();
                //dd($tramo1->asientos_economy);
            }
            else if ($this->escalas == 2)
            {
                $tramo1 = $this->getTramo1;
                $tramo2 = $this->getTramo2;
                $tramo1->asientos_economy = $tramo1->asientos_economy - $cantidad;
                $tramo2->asientos_economy = $tramo2->asientos_economy - $cantidad;
                $tramo1->save();
                $tramo2->save();
            }
        }
        else if($cabina == "bussiness")
        {
            if($this->escalas == 1)
            {
                $tramo1 = $this->getTramo1;
                $tramo1->asientos_bussiness = $tramo1->asientos_bussiness- $cantidad;
                $tramo1->save();
            }
            else if ($this->escalas == 2)
            {
                $tramo1 = $this->getTramo1;
                $tramo2 = $this->getTramo2;
                $tramo1->asientos_bussiness = $tramo1->asientos_bussiness- $cantidad;
                $tramo2->asientos_bussiness = $tramo2->asientos_bussiness- $cantidad;
                $tramo1->save();
                $tramo2->save();
            }
        }
        else if($cabina == "premium")
        {
            if($this->escalas == 1)
            {
                $tramo1 = $this->getTramo1;
                $tramo1->asientos_premium = $tramo1->asientos_premium - $cantidad;
                $tramo1->save();
            }
            else if ($this->escalas == 2)
            {
                $tramo1 = $this->getTramo1;
                $tramo2 = $this->getTramo2;
                $tramo1->asientos_premium = $tramo1->asientos_premium - $cantidad;
                $tramo2->asientos_premium = $tramo2->asientos_premium - $cantidad;
                $tramo1->save();
                $tramo2->save();
            }
        }

    }
    public static function buscarVuelos($params)
    {
        $vuelosFiltrados = [];
        $fechaPartida = Carbon::createFromFormat('Y-m-d', $params['fechaida']);
        /** Premium */
        if($params['cabina'] == 1) {
            //dump("aqui1");
            $vuelos = static::where('origin_id', '=', $params['origen'])
                ->whereDate('fecha_despegue', '=', $fechaPartida->format('Y-m-d'))
                ->where('destiny_id', '=', $params['destino'])
                ->get();
            foreach ($vuelos as $vuelo)
            {
                //dump($vuelo->escalas);
                if($vuelo->escalas == 1)
                {
                    //dump("aqui1.1");
                    if($vuelo->getTramo1->asientos_premium >= $params['pasajeros'])
                    {
                        $vuelosFiltrados[] = $vuelo;
                    }
                }
                else if ($vuelo->escalas == 2)
                {
                    if($vuelo->getTramo1->asientos_premium >= $params['pasajeros'])
                    {
                        if($vuelo->getTramo2->asientos_premium >= $params['pasajeros'])
                        {
                            $vuelosFiltrados[] = $vuelo;
                        }
                    }
                }
            }
        }
        /** Bussiness */
        else if($params['cabina'] == 2) {
            //dump("aqui2");
            $vuelos = static::where('origin_id', '=', $params['origen'])
                ->whereDate('fecha_despegue', '=', $fechaPartida->format('Y-m-d'))
                ->where('destiny_id', '=', $params['destino'])
                ->get();
            foreach ($vuelos as $vuelo)
            {
                if($vuelo->escalas == 1)
                {
                    if($vuelo->getTramo1->asientos_bussiness >= $params['pasajeros'])
                    {
                        $vuelosFiltrados[] = $vuelo;
                    }
                }
                else if ($vuelo->escalas == 2)
                {
                    if($vuelo->getTramo1->asientos_bussiness >= $params['pasajeros'])
                    {
                        if($vuelo->getTramo2->asientos_bussiness >= $params['pasajeros'])
                        {
                            $vuelosFiltrados[] = $vuelo;
                        }
                    }
                }
            }
        }
        /** Economy */
        else {
            //dump("aqui3");
            $vuelos = static::where('origin_id', '=', $params['origen'])
                ->whereDate('fecha_despegue', '=', $fechaPartida->format('Y-m-d'))
                ->where('destiny_id', '=', $params['destino'])
                ->get();
            foreach ($vuelos as $vuelo)
            {
                if($vuelo->escalas == 1)
                {
                    if($vuelo->getTramo1->asientos_economy >= $params['pasajeros'])
                    {
                        $vuelosFiltrados[] = $vuelo;
                    }
                }
                else if ($vuelo->escalas == 2)
                {
                    if($vuelo->getTramo1->asientos_economy >= $params['pasajeros'])
                    {
                        if($vuelo->getTramo2->asientos_economy >= $params['pasajeros'])
                        {
                            $vuelosFiltrados[] = $vuelo;
                        }
                    }
                }
            }
        }
        return $vuelosFiltrados;
    }
}
