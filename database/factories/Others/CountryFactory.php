<?php

use App\Modules\Others\Country;
use Faker\Generator as Faker;

$factory->define(Country::class, function (Faker $faker) {
    return [
        'nombre' => $faker->country,
    ];
});
