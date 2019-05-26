<?php

use Faker\Generator as Faker;
use App\Modules\HousingReservation\HotelReservationDetail;

$factory->define(HotelReservationDetail::class, function (Faker $faker) {
    /* LLaves foráneas */
    $hotel_reservation_id = DB::table('hotel_reservations')->select('id')->get();
    $hotel_room_id = DB::table('hotel_rooms')->select('id')->get();
	// $private_housing_id = DB::table('private_housings')->select('id')->get();
	
    return [
    	'hotel_reservation_id' => $hotel_reservation_id->random()->id,
    	'hotel_room_id' => $hotel_room_id->random()->id,
    	// 'private_housing_id' => $private_housing_id->random()->id,
    	'fecha_ingreso' => $faker->date,
	    'fecha_egreso' => $faker->date,
	    'precio' => $faker->numberBetween($min = 1000, $max = 999999),
	    'tipo' => $faker->text,
    ];
});
