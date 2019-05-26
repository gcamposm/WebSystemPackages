<?php

use Faker\Generator as Faker;
use App\Modules\HousingReservation\Room;

$factory->define(Room::class, function (Faker $faker) {
    /* LLaves foráneas */
	$private_housing_id = DB::table('private_housings')->select('id')->get();
	
	return [
    	'private_housing_id' => $private_housing_id->random()->id,
    	'piso' => $faker->numberBetween($min = 1, $max = 30),
    	'numero' => $faker->numberBetween($min = 1, $max = 1000),
    	'camas' => $faker->numberBetween($min = 1, $max = 5),
    ];
});
