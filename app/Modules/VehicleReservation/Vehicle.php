<?php

namespace App\Modules\VehicleReservation;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Modules\Others\Package;
class Vehicle extends Model
{
    protected $table = 'vehicles';


    protected $fillable = [
        'patente',
        'vehicle_calendary_id',
        'vehicle_provider_id',
        'zone_id',
        'marca',
        'tipo',
        'gamma',
        'transmision',
        'combustible',
        'n_pasajeros',
        'equipaje_g',
        'equipaje_p',
        'n_puertas',
        'n_kilometraje',
        'precio',
        'aire_acondicionado',
        'ciudad_id',
        'pais',
    	'ciudad',
    ];

    /* Relaciones */

    public function package(){
    	return $this->hasMany(Package::class);
    }

    public function vehicleCalendary(){
    	return $this->belongsTo(VehicleCalendary::class);
    }

    public function zone(){
    	return $this->belongsTo(Zone::class);
    }

    public function vehicleProvider(){
    	return $this->belongsTo(VehicleProvider::class);
    }

    public function serviceAndVehicle(){
    	return $this->hasMany(ServiceAndVehicle::class);
    }

    public function vehicleReservation(){
    	return $this->hasMany(VehicleReservation::class);
    }

    public function vehicleReservationDetail(){
    	return $this->hasMany(VehicleReservationDetail::class);
    }

    public static function buscarVehiculos($params)
	{
		$fechaRecogida = Carbon::createFromFormat('Y-m-d', $params['fecha-recogida']);
		$fechaDevolucion= Carbon::createFromFormat('Y-m-d', $params['fecha-devolucion']);
		$vehiculos = DB::table('vehicles')
                ->join('vehicle_reservations as reservations', 'vehicles.id', '=', 'reservations.vehicle_id')
				->whereDate('reservations.fecha_retiro', '<=', $fechaRecogida->format('Y-m-d'))
				->whereDate('reservations.fecha_regreso', '>=', $fechaRecogida->format('Y-m-d'))
				->orWhereDate('reservations.fecha_retiro', '<=', $fechaDevolucion->format('Y-m-d'))
				->whereDate('reservations.fecha_regreso', '>=', $fechaDevolucion->format('Y-m-d'))
                ->select('vehicles.id', 'vehicles.marca')->get();
		$room_final = [];
		$array_id = [];		
		$vehicles = Vehicle::all();
		foreach($vehiculos as $vehiculo)
		{
			$array_id[] = $vehiculo->id;
		}
        $autos = static::where('n_pasajeros', '>=', $params['pasajeros'])
            ->where('vehicles.ciudad_id', '=', $params['zone'])
            ->where('n_pasajeros', '>=', $params['pasajeros'])
            ->whereNotIn('id', $array_id)->get();
        return $autos;
        
        // $vehicles = Vehicle::where('zone_id', request('zone'))
        //             ->where('n_pasajeros', '>=', (int)$pasajeros)
        //       
        
        
        // $fechaEntrada = Carbon::createFromFormat('Y-m-d', $params['fecha-entrada-housing']);
		// $fechaSalida= Carbon::createFromFormat('Y-m-d', $params['fecha-salida-housing']);
		// $habitaciones = DB::table('hotel_rooms as rooms')
		// 		->join('hotel_reservations as reservations', 'rooms.id', '=', 'reservations.hotel_room_id')
		// 		->whereDate('reservations.fecha_ingreso', '<=', $fechaEntrada->format('Y-m-d'))
		// 		->whereDate('reservations.fecha_egreso', '>=', $fechaEntrada->format('Y-m-d'))
		// 		->orWhereDate('reservations.fecha_ingreso', '<=', $fechaSalida->format('Y-m-d'))
		// 		->whereDate('reservations.fecha_egreso', '>=', $fechaSalida->format('Y-m-d'))
		// 		->select('rooms.id', 'rooms.capacidad')->get();
		// $room_final = [];
		// $array_id = [];		
		// $hotel_rooms = HotelRoom::all();
		// foreach($habitaciones as $habitacion)
		// {
		// 	$array_id[] = $habitacion->id;
		// }
		// $rooms = static::where('hotel_rooms.hotel_id', '=', $hotel_id)
		// 	->whereNotIn('id', $array_id)->get();
		// return $rooms;->get();
	}
}
