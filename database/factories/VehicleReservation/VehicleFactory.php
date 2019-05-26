<?php

use Faker\Generator as Faker;
use App\Modules\VehicleReservation\Vehicle;

$factory->define(Vehicle::class, function (Faker $faker) {
    //Faker para vehiculos
    $faker->addProvider(new \MattWells\Faker\Vehicle\Provider($faker));

    //Llaves foráneas
    $vehicle_calendary_id = DB::table('vehicle_calendaries')->select('id')->get();
    $vehicle_provider_id = DB::table('vehicle_providers')->select('id')->get();
    $zone_id = DB::table('zones')->select('id')->get();

    return [
        'patente' => $faker->vehicleRegistration,
        'vehicle_calendary_id' => $vehicle_calendary_id->random()->id,
        'vehicle_provider_id' => $vehicle_provider_id->random()->id,
        'zone_id' => $zone_id->random()->id,
        'marca' => $faker->vehicleMake,
        'tipo' => $faker->randomElement(['Minivan','Automóvil','Camioneta']),
        'gamma' => $faker->randomElement(['Baja','Media', 'Alta']),
        'transmision' => $faker->randomElement(['Manual','Automática']),
        'combustible' => $faker->randomElement(['Bencina','Petróleo']),
        'n_pasajeros' => rand(1,4),
        'equipaje_g' => rand(1,5),
        'equipaje_p' => rand(1,5),
        'n_puertas' => 4,
        'n_kilometraje' => rand(10000,99999),
        'precio' => rand(10,2000),
        'aire_acondicionado' => $faker->randomElement(['Sí','No']),
    ];
});
