<?php

use Faker\Generator as Faker;
use App\Modules\FlightReservation\CheckIn;

$factory->define(CheckIn::class, function (Faker $faker) {
    /* Llaves foráneas */
    $seat_id = DB::table('seats')->select('id')->get();
    $user_id = DB::table('users')->select('id')->get();

    return [
        /*'seat_id' => $seat_id->random()->id,
        'user_id' => $user_id->random()->id,
        'fecha' => $faker->date,
        'estado' => $faker->randomElement($array = array ('Confirmado','Pendiente')),*/
    ];
});
