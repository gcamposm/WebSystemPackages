<?php

use Illuminate\Database\Seeder;
use App\Modules\HousingReservation\HousingService;


class HousingServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(HousingService::class, 20)->create();
    }
}
