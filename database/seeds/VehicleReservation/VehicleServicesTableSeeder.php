<?php

use Illuminate\Database\Seeder;
use App\Modules\VehicleReservation\VehicleService;

class VehicleServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(VehicleService::class, 20)->create();
    }
}
