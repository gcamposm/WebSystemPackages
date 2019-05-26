<?php

use Faker\Generator as Faker;
use App\Modules\HousingReservation\HotelReservation;
use Carbon\Carbon;

$factory->define(HotelReservation::class, function (Faker $faker) {
    //Llaves foráneas
	$sell_id = DB::table('sells')->select('id')->get();
	$hotel_room = DB::table('hotel_rooms')->select('id')->get();
	$date = Carbon::create(2019, 3, mt_rand(1, 3), mt_rand(0, 24), 0, 0);
	
	return [
		'sell_id' => $sell_id->random()->id,
		'hotel_room_id' => $hotel_room->random()->id,
    	'precio' => $faker->numberBetween($min = 1000, $max = 999999),
		'fecha_ingreso' => $date,
		'fecha_egreso' => $date->copy()->addDays(mt_rand(1,5)),
    	'cantidad' =>$faker->numberBetween($min = 1, $max = 10),
    	'monto_total' => $faker->numberBetween($min = 1000, $max = 999999),
    	'descuento' => $faker->numberBetween($min = 1000, $max = 999999),
    ];
});
