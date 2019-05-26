<?php


use App\Modules\FlightReservation\Flight;
use App\Modules\HousingReservation\Hotel;
use App\Modules\FlightReservation\FlightDetail;
use App\Modules\FlightReservation\Airport;
use App\Modules\VehicleReservation\Vehicle;
use App\Modules\VehicleReservation\Zone;
use App\Modules\Others\Package;
use Faker\Generator as Faker;

$factory->define(Package::class, function (Faker $faker) {
    /* Llaves Foráneas */
    $flight_id = DB::table('flights')->select('id')->get();
    $hotel_id = DB::table('hotels')->select('id')->get();
    $vehicle_id = DB::table('vehicles')->select('id')->get();

        $id_flight = $flight_id->random()->id;
        $id_hotel = $hotel_id->random()->id;
        $id_vehicle = $vehicle_id->random()->id;

        $flight = Flight::findOrfail($id_flight);
        $hotel = Hotel::findOrfail($id_hotel);
        $vehicle = Vehicle::findOrfail($id_vehicle);

        $id_zone = $vehicle->zone_id;
        $city_vehicle = $vehicle->ciudad_id;

        $id_destiny = $flight->destiny_id;
        $airport = Airport::findOrfail($id_destiny);
        /** Destino vuelo */
        $city_airport = $airport->ciudad_id;
        /** Destino hotel $city_hotel */
        $city_hotel = $hotel->ciudad_id;

        $count = 0;
        $iguales1 = 0;
        $iguales2 = 0;
        while($count <= 30 and $iguales1 == 0)
        {
            if($city_hotel != $city_airport)
            {

                $id_hotel = $hotel_id->random()->id;
                $hotel = Hotel::findOrfail($id_hotel);
                $city_hotel = $hotel->ciudad_id;
                //echo "$count ID Ciudad Airport: $city_airport", "ID Ciudad Hotel: $city_hotel\n";
            }
            else{
                $iguales1 = 1;
            }
            $count = $count + 1;
        }
        if($count == 31)
        {
            $id_hotel = null;
            //echo "HOTEL NULO\n";
        }



        $count = 0;
        while($count <= 30 and $iguales2 == 0)
        {
            if($city_vehicle != $city_airport)
            {
                $id_vehicle = $vehicle_id->random()->id;
                $id_zone = $vehicle->zone_id;
                $zone = Zone::findOrfail($id_zone);
                $city_vehicle = $vehicle->ciudad_id;
                //echo "$count ID Ciudad Airport: $city_airport", "ID Ciudad Vehiculo: $city_vehicle\n";
            }
            else{
                $iguales2 = 1;
                //echo "IGUALES :D\n";
            }
            $count = $count + 1;
        }
        if($count == 31)
        {
            $id_vehicle = null;
            //echo "VEHICULO NULO\n";
        }

    //TIPO DE PAQUETE
    while($id_vehicle == null and $id_hotel== null)
    {
        $id_flight = $flight_id->random()->id;
        $id_hotel = $hotel_id->random()->id;
        $id_vehicle = $vehicle_id->random()->id;

        $flight = Flight::findOrfail($id_flight);
        $hotel = Hotel::findOrfail($id_hotel);
        $vehicle = Vehicle::findOrfail($id_vehicle);

        $id_zone = $vehicle->zone_id;
        $city_vehicle = $vehicle->ciudad_id;

        $id_destiny = $flight->destiny_id;
        $airport = Airport::findOrfail($id_destiny);
        /** Destino vuelo */
        $city_airport = $airport->ciudad_id;
        /** Destino hotel $city_hotel */
        $city_hotel = $hotel->ciudad_id;

        $count = 0;
        $iguales1 = 0;
        $iguales2 = 0;
        while($count <= 30 and $iguales1 == 0)
        {
            if($city_hotel != $city_airport)
            {

                $id_hotel = $hotel_id->random()->id;
                $hotel = Hotel::findOrfail($id_hotel);
                $city_hotel = $hotel->ciudad_id;
                //echo "$count ID Ciudad Airport: $city_airport", "ID Ciudad Hotel: $city_hotel\n";
            }
            else{
                $iguales1 = 1;
            }
            $count = $count + 1;
        }
        if($count == 31)
        {
            $id_hotel = null;
            //echo "HOTEL NULO\n";
        }



        $count = 0;
        while($count <= 30 and $iguales2 == 0)
        {
            if($city_vehicle != $city_airport)
            {
                $id_vehicle = $vehicle_id->random()->id;
                $id_zone = $vehicle->zone_id;
                $zone = Zone::findOrfail($id_zone);
                $city_vehicle = $vehicle->ciudad_id;
                //echo "$count ID Ciudad Airport: $city_airport", "ID Ciudad Vehiculo: $city_vehicle\n";
            }
            else{
                $iguales2 = 1;
                //echo "IGUALES :D\n";
            }
            $count = $count + 1;
        }
        if($count == 31)
        {
            $id_vehicle = null;
            //echo "VEHICULO NULO\n";
        }
    }
     if($id_vehicle == null)
    {
        $tipo = 1;
    }
    else if($id_hotel == null)
    {
        $tipo = 2;
    }
    else{
        $tipo = 3;
    }

    return [
        'flight_id' =>$id_flight,
        'hotel_id' => $id_hotel,
        'vehicle_id' => $id_vehicle,
        'type' => $tipo,
        'fecha_inicio' => $faker->dateTimeBetween($startDate = '+2 weeks', $endDate = '+4 weeks', $timezone = null),
        'fecha_fin' => $faker->dateTimeBetween($startDate = '+2 weeks', $endDate = '+4 weeks', $timezone = null),
    ];
});
