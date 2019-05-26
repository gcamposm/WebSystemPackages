<?php

use Faker\Generator as Faker;
use App\Modules\HousingReservation\HousingAndService;

$factory->define(HousingAndService::class, function (Faker $faker) {
    /* LLaves foráneas */
    $housing_service_id = DB::table('housing_services')->select('id')->get();
    $private_housing_id = DB::table('private_housings')->select('id')->get();
    
    return [
    	'housing_service_id' => $housing_service_id->random()->id,
    	'private_housing_id' => $private_housing_id->random()->id,
    ];
});
