<?php

use Illuminate\Database\Seeder;
use App\Modules\FlightReservation\FlightReservation;

class FlightReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(FlightReservation::class, 20)->create();
    }
}
