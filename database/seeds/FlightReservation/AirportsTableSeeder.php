<?php

use Illuminate\Database\Seeder;
use App\Modules\FlightReservation\Airport;

class AirportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Airport::class, 10)->create();
    }
}
