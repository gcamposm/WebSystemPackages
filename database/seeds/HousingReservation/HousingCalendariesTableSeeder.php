<?php

use Illuminate\Database\Seeder;
use App\Modules\HousingReservation\HousingCalendary;

class HousingCalendariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(HousingCalendary::class, 20)->create();
    }
}
