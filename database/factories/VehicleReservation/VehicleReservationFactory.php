<?php

use Faker\Generator as Faker;
use App\Modules\VehicleReservation\VehicleReservation;

$factory->define(VehicleReservation::class, function (Faker $faker) {
    //Llaves foráneas
    $sell_id = DB::table('sells')->select('id')->get();
    $vehicle_id = DB::table('vehicles')->select('id')->get();
    
    return [
        'sell_id' => $sell_id->random()->id,
        'vehicle_id' => $vehicle_id->random()->id,
        'monto_total' => rand(10000,99999),
        'fecha_retiro' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+2 weeks', $timezone = null),
        'fecha_regreso' => $faker->dateTimeBetween($startDate = '+2 weeks', $endDate = '+4 weeks', $timezone = null),
    ];
});
