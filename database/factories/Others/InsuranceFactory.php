<?php

use Faker\Generator as Faker;
use App\Modules\Others\Insurance;

$factory->define(Insurance::class, function (Faker $faker) {

    //Llaves foráneas
    $zone_id = DB::table('zones')->select('id')->get();

    return [
        'flight_id' => null,
        'zone_id' => $zone_id->random()->id,
        'medicalService' => $faker->randomElement(['Normal','Premium','Platino']),
        'service2' => $faker->randomElement(['Localización de equipajes','Reembolso de gastos por vuelo demorado o cancelado','Asistencia en caso de robo o extravío de documentos']),
        'service3' => $faker->randomElement(['Incluye seguro por accidentes','Garantía de cancelación e interrupción de viaje por fuerza mayor','Hasta 365 días consecutivos de viaje']),
        'active' => 'No',
        'groupsize' => $faker->randomElement(['Individual','Grupo']),
        'avgage' => rand(10, 99),
        'price' => rand(2000, 15000),
        
    ];
});
