<?php

use App\Modules\FlightReservation\Airport;
use App\Modules\FlightReservation\FlightDetail;
use App\Modules\Others\City;
use Illuminate\Database\Seeder;
use App\Modules\FlightReservation\Flight;

class FlightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(Flight::class, 20)->create();
        $origenes = Airport::all();
        $destinos = Airport::all();

        foreach($origenes as $origen)
        {
            foreach ($destinos as $destino)
            {
                if($origen->id != $destino->id)
                {
                    $vuelos = FlightDetail::buscarVuelosSeed($origen->id, $destino->id);
                    foreach ($vuelos as $vuelo)
                    {
                        if($vuelo->getNumeroEscalas() == 1)
                        {
                            $escala = $vuelo->getEscala1();
                            $escala_id = $vuelo->getEscala1()->id;
                            Flight::create([
                                'escalas' => $vuelo->getNumeroEscalas(),
                                'origin_id' => $escala->origin_id,
                                'destiny_id' => $escala->destiny_id,
                                'tramo1_id' => $escala_id,
                                'tramo2_id' => null,
                                'precio_economy' => $vuelo->getPrecio("economy"),
                                'precio_bussiness' => $vuelo->getPrecio("bussiness"),
                                'precio_premium' => $vuelo->getPrecio("premium"),
                                'fecha_despegue' => $vuelo->getFechaSalida(),
                                'fecha_aterrizaje' => $vuelo->getFechaAterrizaje(),
                            ]);
                        }
                        if($vuelo->getNumeroEscalas() == 2)
                        {
                            $escala1 = $vuelo->getEscala1();
                            $escala2 = $vuelo->getEscala2();

                            $escala_id1 = $vuelo->getEscala1()->id;
                            $escala_id2 = $vuelo->getEscala2()->id;
                            Flight::create([
                                'escalas' => $vuelo->getNumeroEscalas(),
                                'origin_id' => $escala1->origin_id,
                                'destiny_id' => $escala2->destiny_id,
                                'tramo1_id' => $escala_id1,
                                'tramo2_id' => $escala_id2,
                                'precio_economy' => $vuelo->getPrecio("economy"),
                                'precio_bussiness' => $vuelo->getPrecio("bussiness"),
                                'precio_premium' => $vuelo->getPrecio("premium"),
                                'fecha_despegue' => $vuelo->getFechaSalida(),
                                'fecha_aterrizaje' => $vuelo->getFechaAterrizaje(),
                            ]);
                        }
                    }
                }

            }
        }
    }
}
