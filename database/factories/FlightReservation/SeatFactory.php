<?php

use Faker\Generator as Faker;
use App\Modules\FlightReservation\Seat;

$factory->define(Seat::class, function (Faker $faker) {
    /* Llaves foráneas */
    // $avion_id = DB::table('aviones')->select('id')->get();
    
    return [
        // 'avion_id' => $avion_id->random()->id,
        'user_id' => null,
        'numero' => $faker->randomDigit,
        'letra' => $faker->randomElement($array = array ('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s')),
        //'tipo' => $faker->randomElement($array = array ('cama','doble','discapacitados')),
        //'tipo' => $faker->randomElement($array = array ('turista','premium','business')),
        'disponible' => true,
    ];
});
