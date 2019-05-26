<?php

use Faker\Generator as Faker;
use App\Modules\Others\City;

$factory->define(City::class, function (Faker $faker) {
    $paises_id = DB::table('countries')->select('id')->get();
    return [
        'nombre' => $faker->unique()->city,
        'pais_id' => $paises_id->random()->id
    ];
});
