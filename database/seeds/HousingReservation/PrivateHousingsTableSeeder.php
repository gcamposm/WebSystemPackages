<?php

use Illuminate\Database\Seeder;
use App\Modules\HousingReservation\PrivateHousing;

class PrivateHousingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PrivateHousing::class, 20)->create();
    }
}
