<?php

use Faker\Generator as Faker;
use App\Modules\HousingReservation\ServiceAndRoom;

$factory->define(ServiceAndRoom::class, function (Faker $faker) {
    /* Llaves foráneas */
    $housing_service_id = DB::table('housing_services')->select('id')->get();
    $hotel_room_id = DB::table('hotel_rooms')->select('id')->get();

    return [
    	'housing_service_id' => $housing_service_id->random()->id,
    	'hotel_room_id' => $hotel_room_id->random()->id,
    ];
});
