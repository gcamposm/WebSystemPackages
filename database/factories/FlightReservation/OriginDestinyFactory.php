<?php

use App\Modules\FlightReservation\FlightDetail;
use Faker\Generator as Faker;
use App\Modules\FlightReservation\OriginDestiny;

$factory->define(OriginDestiny::class, function (Faker $faker) {
    /* Llaves foráneas */
    $flight_detail_id = DB::table('flight_details')->select('id')->get();
    $airport_id = DB::table('airports')->select('id')->get();
    //$flights = \App\Modules\FlightReservation\FlightDetail::All();
    return [
        'flight_detail_id' => $flight_detail_id->random()->id,
        'airport_id' => $airport_id->random()->id,
    ];
});
