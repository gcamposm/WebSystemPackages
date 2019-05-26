<?php

use Faker\Generator as Faker;
use App\Modules\VehicleReservation\VehicleProvider;

$factory->define(VehicleProvider::class, function (Faker $faker) {
    return [
        'politica_combustible' => $faker->word,
        'calificacion' => rand(1,5),
        'kilometraje' => rand(10000,99999),
        'documentacion_necesaria' => $faker->text,
        'franquicia_daños' => $faker->text,
        'deposito_seguridad' => rand(10000,99999),
    ];
});
