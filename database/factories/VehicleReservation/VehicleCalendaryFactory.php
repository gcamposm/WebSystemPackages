<?php

use Faker\Generator as Faker;
use App\Modules\VehicleReservation\VehicleCalendary;

$factory->define(VehicleCalendary::class, function (Faker $faker) {
    return [
        'año' => $faker->year($max = 'now'),
        'mes' => $faker->monthName($max = 'now'),
        'dia' => $faker->dayOfMonth($max = 'now')
    ];
});
