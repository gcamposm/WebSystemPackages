<?php

use Illuminate\Database\Seeder;
use App\Modules\HousingReservation\HotelReservationDetail;

class HotelReservationDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(HotelReservationDetail::class, 20)->create();
    }
}
