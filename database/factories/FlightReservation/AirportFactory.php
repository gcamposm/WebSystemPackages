<?php

use App\Modules\Others\City;
use App\Modules\Others\Country;
use Faker\Generator as Faker;
use App\Modules\FlightReservation\Airport;

$factory->define(Airport::class, function (Faker $faker){
    $cities_id = DB::table('cities')->select('id')->get();
    $city_id = $cities_id->random()->id;
    $city = City::findOrFail($city_id);
    $country_id = $city->pais_id;
    $country = Country::findOrFail($country_id);
    return [
        'ciudad_id' => $city_id,
        'pais' => $country->nombre,
    	'ciudad' => $city->nombre,
    	'direccion' => $faker->address,
    	'nombre' =>  $faker->company,
    ];
});
