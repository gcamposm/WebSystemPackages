<?php

use Illuminate\Database\Seeder;
use App\Modules\VehicleReservation\Zone;

class ZonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Zone::class, 20)->create();
    }
}
