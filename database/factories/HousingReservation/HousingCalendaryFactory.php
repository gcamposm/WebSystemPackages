<?php

use Faker\Generator as Faker;
use App\Modules\HousingReservation\HousingCalendary;

$factory->define(HousingCalendary::class, function (Faker $faker) {
    //Llaves foráneas
    $room_id = DB::table('hotel_rooms')->select('id')->get();
    return [
        'room_id' => $room_id->random()->id,
    	'date' => $faker->date($format = 'Y-m-d', $max = 'now')
    ];
});
