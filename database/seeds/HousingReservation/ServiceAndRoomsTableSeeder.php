<?php

use Illuminate\Database\Seeder;
use App\Modules\HousingReservation\ServiceAndRoom;

class ServiceAndRoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ServiceAndRoom::class, 20)->create();
    }
}
