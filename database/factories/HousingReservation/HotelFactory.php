<?php

use Faker\Generator as Faker;
use App\Modules\HousingReservation\Hotel;
use App\Modules\Others\City;
use App\Modules\Others\Country;

$factory->define(Hotel::class, function (Faker $faker) {
	//Llaves foráneas
	$cities_id = DB::table('airports')->select('ciudad_id')->get();
    $city_id = $cities_id->random()->ciudad_id;
    $city = City::findOrFail($city_id);
    $country_id = $city->pais_id;
    $country = Country::findOrFail($country_id);
	
    return [
    		'nombre' =>  $faker->company,
    		//'ciudad_id' => $city_id,
        	//'pais' => $country->nombre,
    		//'ciudad' => $city->nombre,
    		'direccion' => $faker->address,
			'estrellas' => $faker->numberBetween($min = 1, $max = 5),
			'valoracion'=> $faker->numberBetween($min = 0, $max = 10),
			'capacidad'=> $faker->numberBetween($min = 0, $max = 9999),
    ];
});
