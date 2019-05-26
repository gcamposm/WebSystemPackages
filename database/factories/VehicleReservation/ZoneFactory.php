<?php

use Faker\Generator as Faker;
use App\Modules\VehicleReservation\Zone;
use App\Modules\Others\City;
use App\Modules\Others\Country;

$factory->define(Zone::class, function (Faker $faker) {
    //Llaves foráneas
    //Llaves foráneas
	$cities_id = DB::table('cities')->select('id')->get();
    $city_id = $cities_id->random()->id;
    $city = City::findOrFail($city_id);
    $country_id = $city->pais_id;
    $country = Country::findOrFail($country_id);
    $random = rand(1,2);
    if($random == 1)
    {
        $cities_id = DB::table('airports')->select('ciudad_id')->get();
        $city_id = $cities_id->random()->ciudad_id;
        $city = City::findOrFail($city_id);
    }
    return [
        'nombre' => $faker->state,
        'ciudad_id' => $city_id,
        'pais' => $country->nombre,
    	'ciudad' => $city->nombre,
    	'direccion' => $faker->address,
    ];
});
