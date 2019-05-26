<?php

use Faker\Generator as Faker;
use App\Modules\VehicleReservation\VehicleReservationDetail;
use Carbon\Carbon;

$factory->define(VehicleReservationDetail::class, function (Faker $faker) {
    //Llaves foráneas
    $vehicle_reservation_id = DB::table('vehicle_reservations')->select('id')->get();
    $vehicle_id = DB::table('vehicles')->select('id')->get();
    $date = Carbon::create(2019, 3, mt_rand(6, 10));

    return [
        'vehicle_reservation_id' => $vehicle_reservation_id->random()->id,
        'vehicle_id' => $vehicle_id->random()->id,
        'fecha_retiro' => $date,
        'fecha_regreso' => $date->copy()->addDays(mt_rand(1,5)),
        'precio_reserva' => rand(500,2000),
        'descuento' =>  0.2,
        'cantidad' => rand(1,2),
    ];
});
