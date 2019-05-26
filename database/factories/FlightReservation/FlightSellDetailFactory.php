<?php

use Faker\Generator as Faker;
use App\Modules\FlightReservation\FlightSellDetail;

$factory->define(FlightSellDetail::class, function (Faker $faker) {
    /* Llaves foráneas */
    $sell_id = DB::table('sells')->select('id')->get();
    $flight_id = DB::table('flights')->select('id')->get();
    
    return [
        'sell_id' => $sell_id->random()->id,
        'flight_id' => $flight_id->random()->id,
        'precio' => strval($faker->numberBetween($min = 500, $max = 5000)),
        'descuento' =>strval($faker->numberBetween($min = 10, $max = 500)),
        'monto_total' =>strval($faker->numberBetween($min = 500, $max = 5000)),
        'tipo' => $faker->randomElement($array = array ('ida','vuelta')),
        'cantidad' => $faker->numberBetween($min = 1, $max = 5),
    ];
});
