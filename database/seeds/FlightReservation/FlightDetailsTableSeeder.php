<?php

use Illuminate\Database\Seeder;
use App\Modules\FlightReservation\FlightDetail;

class FlightDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(FlightDetail::class, 500)->create();
    }
}
