<?php

use Faker\Generator as Faker;
use App\Modules\VehicleReservation\ServiceAndVehicle;

$factory->define(ServiceAndVehicle::class, function (Faker $faker) {
    //Llaves foráneas
    $vehicle_service_id = DB::table('vehicle_services')->select('id')->get();
    $patente = DB::table('vehicles')->select('patente')->get();
    
    return [
        'vehicle_service_id' => $vehicle_service_id->random()->id,
        'patente' => $patente->random()->patente,
        'precio' => rand(10000,99999),
    ];
});
