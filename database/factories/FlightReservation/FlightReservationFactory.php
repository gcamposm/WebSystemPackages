<?php

use Faker\Generator as Faker;
use App\Modules\FlightReservation\FlightReservation;

$factory->define(FlightReservation::class, function (Faker $faker) {
    /* Llaves Foráneas */
    $flight_id = DB::table('flights')->select('id')->get();

    return [
        'flight_id' => $flight_id->random()->id,
        'fecha' =>$faker->dateTime,
        'precio' => $faker->numberBetween($min = 500, $max = 5000),
        'tipo' => $faker->randomElement($array = array ('ida','vuelta')),
     ];
});
