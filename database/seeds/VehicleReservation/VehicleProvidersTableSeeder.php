<?php

use Illuminate\Database\Seeder;
use App\Modules\VehicleReservation\VehicleProvider;

class VehicleProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(VehicleProvider::class, 20)->create();
    }
}
