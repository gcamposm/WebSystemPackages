<?php

use Faker\Generator as Faker;
use App\Modules\HousingReservation\PrivateHousing;

$factory->define(PrivateHousing::class, function (Faker $faker) {
    /* LLaves foráneas */
	$housing_calendary_id = DB::table('housing_calendaries')->select('id')->get();
	
    return [
    	'housing_calendary_id' => $housing_calendary_id->random()->id,
    	'capacidad' => $faker->numberBetween($min = 1000, $max = 999999),
    	'direccion' => $faker->address,
	    'nombre' => $faker->name,
	    'estrella'=> $faker->numberBetween($min = 0, $max = 5),
	    'valoracion'=> $faker->numberBetween($min = 0, $max = 5),
	    'pais'=> $faker->country,
    ];
});
