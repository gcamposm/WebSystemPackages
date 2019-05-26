<?php

use Illuminate\Database\Seeder;
use App\Modules\FlightReservation\OriginDestiny;

class OriginDestiniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(OriginDestiny::class, 20)->create();
    }
}
