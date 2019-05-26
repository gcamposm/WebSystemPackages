<?php

use Illuminate\Database\Seeder;
use App\Modules\HousingReservation\HousingAndService;

class HousingAndServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                factory(HousingAndService::class, 20)->create();
    }
}
