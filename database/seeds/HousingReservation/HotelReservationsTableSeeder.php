<?php

use Illuminate\Database\Seeder;
use App\Modules\HousingReservation\HotelReservation;

class HotelReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(HotelReservation::class, 20)->create();
    }
}
