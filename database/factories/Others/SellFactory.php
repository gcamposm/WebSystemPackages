<?php

use Faker\Generator as Faker;
use App\Modules\Others\Sell;

$factory->define(Sell::class, function (Faker $faker) {
    //Llaves foráneas
    $user_id = DB::table('users')->select('id')->get();
    
    return [
        'source' => $faker->iban(null),
        'user_id' => $user_id->random()->id,
        'monto_total' => strval(rand(10000,99999)),
        'impuesto' => strval(0.19),
        'tipo_comprobante' => $faker->randomElement(['Factura','Boleta']),
        'metodo_pago' => $faker->randomElement(['Factura','Boleta']),
        'descuento' => strval(rand(10000,99999)),
    ];
});
