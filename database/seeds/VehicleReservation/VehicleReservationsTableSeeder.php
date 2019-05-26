<?php

use Illuminate\Database\Seeder;
use App\Modules\VehicleReservation\VehicleReservation;

class VehicleReservationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(VehicleReservation::class, 20)->create();
    }
}
