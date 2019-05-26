<?php

use Illuminate\Database\Seeder;
use App\Modules\VehicleReservation\VehicleReservationDetail;

class VehicleReservationDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(VehicleReservationDetail::class, 20)->create();
    }
}
