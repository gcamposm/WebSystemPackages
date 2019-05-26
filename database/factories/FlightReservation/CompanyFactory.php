<?php

use Faker\Generator as Faker;
use App\Modules\FlightReservation\Company;

$factory->define(Company::class, function (Faker $faker) {
    return [
        'direccion' => $faker->address,
    	'nombre' =>  $faker->company,
    ];
});
