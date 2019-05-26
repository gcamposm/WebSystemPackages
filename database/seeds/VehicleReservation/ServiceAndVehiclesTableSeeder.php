<?php

use Illuminate\Database\Seeder;
use App\Modules\VehicleReservation\ServiceAndVehicle;

class ServiceAndVehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ServiceAndVehicle::class, 20)->create();
    }
}
