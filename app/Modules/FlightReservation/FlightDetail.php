<?php

namespace App\Modules\FlightReservation;

//use Illuminate\Support\Carbon;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FlightDetail extends Model
{
    protected $table = 'flight_details';


    protected $fillable = [
        'airport_id',
        'origin_id',
        'destiny_id',
        'fecha_despegue',
        'fecha_aterrizaje',
        'precio_economy',
        'precio_bussiness',
        'precio_premium',
        'asientos_economy',
        'asientos_bussiness', 
        'asientos_premium',
    ];

    /* Relaciones */

    public function airplane()
    {
        return $this->belongsTo(Airplane::class);
    }

    /*public function flight()
    {
        return $this->belongsTo(Flight::class);
    }*/

    // public function origen_destino()
    // {
    //     return $this->hasMany(OrigenDestino::class);
    // }

    public function origin()
    {
        return $this->belongsTo(Airport::class, 'origin_id');
    }
    public function destiny()
    {
        return $this->belongsTo(Airport::class, 'destiny_id');
    }
    public function presentPrice()
    {
        return money_format('$%i', $this->precio);
    }
    public function horarioDespegue()
    {
        return Carbon::parse($this->fecha_despegue)->format('H:i d-m-Y');
    }

    public function horarioAterrizaje()
    {
        return Carbon::parse($this->fecha_aterrizaje)->format('H:i d-m-Y');
    }
    public function duracion()
    {
        $fechaPartida = Carbon::parse($this->fecha_despegue);
        $fechaLlegada = Carbon::parse($this->fecha_aterrizaje);

        return $fechaLlegada->diff($fechaPartida)->format('%Hh %im');
    }
    public function getPrecio($cabina)
    {
        if($cabina == "economy")
        {
            return $this->precio_economy;

        }
        else if($cabina == "premium")
        {
            return $this->precio_premium;

        }
        else if($cabina == "bussiness")
        {
            return $this->precio_bussiness;

        }
        return 0;
    }
    private static function buscarConEscala($params)
    {
        /* array de Vuelo's */
        $fechaPartida = Carbon::createFromFormat('Y-m-d', $params['fechaida']);

        $id_escalas = DB::table('flight_details AS f1')
                            ->join('flight_details AS f2', 'f2.origin_id', '=', 'f1.destiny_id')
                            ->whereDate('f1.fecha_despegue', '=',$fechaPartida->format('Y-m-d'))
                            ->where('f1.origin_id', '=', $params['origen'])
                            ->where('f2.destiny_id', '=', $params['destino'])
                            ->whereDate(DB::raw('f2.fecha_despegue'), '>=',DB::raw('f1.fecha_aterrizaje'))
                            ->whereRaw('DATE_PART(\'hour\', f2.fecha_despegue - f1.fecha_aterrizaje) < 3')
                            ->whereRaw('DATE_PART(\'day\', f2.fecha_despegue - f1.fecha_aterrizaje) = 0')
                            ->select('f1.id AS Vuelo1', 'f2.id AS Vuelo2')->get();


        //dump($id_escala);
        return $id_escalas;
    }

    public static function buscarVuelos($params)
    {

        $fechaPartida = Carbon::createFromFormat('Y-m-d', $params['fechaida']);
  
       $tramos = static::where('origin_id', '=', $params['origen'])
                         ->whereDate('fecha_despegue', '=', $fechaPartida->format('Y-m-d'))
                         ->get();
                         //dump($tramos);
       $vuelos = [];
        $vuelosTest = [];
       //$pasajeros = intval($params['pasajeros_adultos']) + intval($params['pasajeros_ninos']);
  
       foreach ($tramos as $tramo) {
         if ($tramo->destiny_id == $params['destino']) {
           //$asientosDisponibles = $tramo->asientosDisponibles();
  
           //if (count($asientosDisponibles) > $pasajeros) {
             $vuelosTest[] = new FlightC([$tramo->id]);
             //dump($tramo->id);
             $vuelos[] = $tramo;
           //}
         }
         else {
           //$conEscalas = static::buscarConEscala($tramo, $params);
  
           //$vuelos = array_merge($vuelos, $conEscalas);
         }
       }
        $id_escalas = self::buscarConEscala($params);
        $vuelosTest2 = self::agregarVuelosConEscala($id_escalas, $vuelosTest);
        //dump($vuelosTest2);
         return $vuelosTest2;
     }

     public static function agregarVuelosConEscala($id_escalas, $vuelos)
     {

         foreach($id_escalas as $id){
             $vuelos[] = new FlightC([$id->Vuelo1, $id->Vuelo2]);
         }
         return $vuelos;
     }
     /** Metodos para busqueda automática de escalas en el seeder */
     /** -------------------------------------------------- */
    private static function buscarConEscalaSeed($origen, $destino)
    {

        $id_escalas = DB::table('flight_details AS f1')
            ->join('flight_details AS f2', 'f2.origin_id', '=', 'f1.destiny_id')
            ->where('f1.origin_id', '=', $origen)
            ->where('f2.destiny_id', '=', $destino)
            ->whereDate(DB::raw('f2.fecha_despegue'), '>=',DB::raw('f1.fecha_aterrizaje'))
            ->whereRaw('DATE_PART(\'hour\', f2.fecha_despegue - f1.fecha_aterrizaje) < 3')
            ->whereRaw('DATE_PART(\'day\', f2.fecha_despegue - f1.fecha_aterrizaje) = 0')
            ->select('f1.id AS Vuelo1', 'f2.id AS Vuelo2')->get();

        return $id_escalas;
    }

    public static function buscarVuelosSeed($origen, $destino)
    {
        $tramos = static::where('origin_id', '=', $origen)
            ->get();
        $vuelosTest = [];

        foreach ($tramos as $tramo) {
            if ($tramo->destiny_id == $destino) {
                $vuelosTest[] = new FlightC([$tramo->id]);
            }
            else {

            }
        }
        $id_escalas = self::buscarConEscalaSeed($origen, $destino);
        $vuelosTest2 = self::agregarVuelosConEscalaSeed($id_escalas, $vuelosTest);
        return $vuelosTest2;
    }

    public static function agregarVuelosConEscalaSeed($id_escalas, $vuelos)
    {

        foreach($id_escalas as $id){
            $vuelos[] = new FlightC([$id->Vuelo1, $id->Vuelo2]);
        }
        return $vuelos;
    }
    public function getAsientos($tipo)
    {

        $asientos = Seat::where('flight_detail_id', '=', $this->id)
            ->where('tipo', '=', $tipo)->get();

        return $asientos;
    }
}
