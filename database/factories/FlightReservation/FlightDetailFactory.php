<?php

use Carbon\Carbon;
use Faker\Generator as Faker;
use App\Modules\FlightReservation\FlightDetail;

$factory->define(FlightDetail::class, function (Faker $faker) {
    /* Llaves foráneas */
    // $avion_id = DB::table('aviones')->select('id')->get();
	//$flight_id = DB::table('flights')->select('id')->get();
    $origin_id = DB::table('airports')->select('id')->get();
    $destiny_id = DB::table('airports')->select('id')->get();
    $airport_id = DB::table('airports')->select('id')->get();
    $date = Carbon::create(2019, 3, mt_rand(7, 9), mt_rand(0, 24), 0, 0);
    $date2 = $date->copy()->addHours(mt_rand(1,10));
    Carbon::parse($date)->format("Y-m-d H:i:s");
    Carbon::parse($date2)->format("Y-m-d H:i:s");
    $origen = $origin_id->random()->id;
    $destino = $destiny_id->random()->id;
    while($origen == $destino){
        $destino = $destiny_id->random()->id;
    }
    return [
        //'flight_id' => $flight_id->random()->id,
        'airport_id' => $airport_id->random()->id,
        'origin_id' => $origen,
        'destiny_id' => $destino,
        'fecha_despegue' => $date,
        'fecha_aterrizaje' => $date->copy()->addHours(mt_rand(1,10)),
        //'fecha_despegue' => $faker->dateTimeBetween($startDate = 'now', $endDate = '+ 2 days', $timezone = null),
        //'fecha_aterrizaje' =>$faker->dateTimeBetween($startDate = '+ 2 days', $endDate = '+ 3 days', $timezone = null),
        'precio_economy' => $faker->numberBetween($min = 500, $max = 2000),
        'precio_bussiness' => $faker->numberBetween($min = 1000, $max = 4000),
        'precio_premium' => $faker->numberBetween($min = 2000, $max = 6000),
        'asientos_economy' => 10,
        'asientos_bussiness' => 10,
        'asientos_premium' => 10
    ];
});
