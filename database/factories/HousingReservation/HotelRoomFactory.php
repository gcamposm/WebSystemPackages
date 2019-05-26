<?php

use Faker\Generator as Faker;
use App\Modules\HousingReservation\HotelRoom;

$factory->define(HotelRoom::class, function (Faker $faker) {
    //Llaves foráneas
    $hotel_id = DB::table('hotels')->select('id')->get();
	
    return [
    	//'hotel_id' => $hotel_id->random()->id,
    	'capacidad' => $faker->numberBetween($min = 1, $max = 8),
    	'camas' => $faker->numberBetween($min = 1, $max = 4),
		'numero' => $faker->numberBetween($min = 1, $max = 999),
		'precio' => $faker->numberBetween($min = 100, $max = 10000),
		];
});