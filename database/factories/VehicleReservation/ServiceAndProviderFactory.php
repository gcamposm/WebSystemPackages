<?php

use Faker\Generator as Faker;
use App\Modules\VehicleReservation\ServiceAndProvider;

$factory->define(ServiceAndProvider::class, function (Faker $faker) {
    //Llaves foráneas
    $vehicle_service_id = DB::table('vehicle_services')->select('id')->get();
    $vehicle_provider_id = DB::table('vehicle_providers')->select('id')->get();
    
    return [
        'vehicle_service_id' => $vehicle_service_id->random()->id,
        'vehicle_provider_id' => $vehicle_provider_id->random()->id,
    ];
});
