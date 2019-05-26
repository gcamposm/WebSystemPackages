<?php

use Illuminate\Database\Seeder;
use App\Modules\VehicleReservation\Vehicle;
use App\Modules\Others\City;
use App\Modules\Others\Country;

class VehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = City::all();
        foreach ($cities as $city) {
            $country = Country::findOrFail($city->pais_id);
            factory(Vehicle::class, 10)->create([
                'ciudad_id' => $city->id,
                'pais' => $country->nombre,
    		    'ciudad' => $city->nombre]);
        }
    }
}
