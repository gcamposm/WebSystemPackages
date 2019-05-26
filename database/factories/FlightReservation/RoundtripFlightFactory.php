<?php

use App\Modules\FlightReservation\RoundtripFlight;
use Faker\Generator as Faker;

$factory->define(RoundtripFlight::class, function (Faker $faker) {
    $vuelo_ida = DB::table('flights')->select('id')->get();
    $vuelo_vuelta = DB::table('flights')->select('id')->get();
    return [
        'vuelo_ida_id' => $vuelo_ida->random()->id,
        'vuelo_vuelta_id'=> $vuelo_vuelta->random()->id,
        'precio_economy' => $faker->numberBetween($min = 500, $max = 2000),
        'precio_bussiness' => $faker->numberBetween($min = 1000, $max = 4000),
        'precio_premium' => $faker->numberBetween($min = 2000, $max = 6000),
    ];
});
