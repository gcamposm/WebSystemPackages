<?php

use Illuminate\Database\Seeder;
use App\Modules\VehicleReservation\ServiceAndProvider;

class ServiceAndProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ServiceAndProvider::class, 20)->create();
    }
}
