<?php

use Faker\Generator as Faker;
use App\Modules\VehicleReservation\VehicleService;

$factory->define(VehicleService::class, function (Faker $faker) {
    return [
        'nombre_servicio' => $faker->randomElement(['Servicio1','Servicio2', 'Servicio3']),
        'duracion' => rand(1,48),
    ];
});
