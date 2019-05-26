<?php

use Faker\Generator as Faker;
use App\Modules\FlightReservation\Flight;

$factory->define(Flight::class, function (Faker $faker) {
    return [
        'precio' => $faker->numberBetween($min = 500, $max = 5000),
        'duracion_vuelo' => $faker->time,
    ];
});
