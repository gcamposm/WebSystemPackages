<?php

use Illuminate\Database\Seeder;
use App\Modules\HousingReservation\Room;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Room::class, 20)->create();
    }
}
