<?php

use Illuminate\Database\Seeder;
use App\Modules\VehicleReservation\VehicleCalendary;

class VehicleCalendariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(VehicleCalendary::class, 20)->create();
    }
}
