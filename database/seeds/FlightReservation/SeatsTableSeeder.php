<?php

use Illuminate\Database\Seeder;
use App\Modules\FlightReservation\Seat;

class SeatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(Seat::class, 20)->create();
        $tramos = \App\Modules\FlightReservation\FlightDetail::all();
        foreach ($tramos as $tramo)
        {

            factory(Seat::class, 10)->create([
                'flight_detail_id' => $tramo->id,
                'tipo' => "economy"
            ]);
            factory(Seat::class, 10)->create([
                'flight_detail_id' => $tramo->id,
                'tipo' => "bussiness"
            ]);
            factory(Seat::class, 10)->create([
                'flight_detail_id' => $tramo->id,
                'tipo' => "premium"
            ]);

        }
    }
}
