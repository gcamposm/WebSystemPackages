<?php

use Illuminate\Database\Seeder;
use App\Modules\HousingReservation\HotelRoom;
use App\Modules\HousingReservation\Hotel;

class HotelRoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hotels = Hotel::all();
        foreach($hotels as $hotel){
            factory(HotelRoom::class, 9)->create([
                'hotel_id' => $hotel->id
                ]);
        }
    }
}
