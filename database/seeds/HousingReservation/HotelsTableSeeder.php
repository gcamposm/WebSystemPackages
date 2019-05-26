<?php

use Illuminate\Database\Seeder;
use App\Modules\HousingReservation\Hotel;
use App\Modules\Others\City;
use App\Modules\Others\Country;

class HotelsTableSeeder extends Seeder
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
            factory(Hotel::class, 3)->create([
                'ciudad_id' => $city->id,
                'pais' => $country->nombre,
    		    'ciudad' => $city->nombre]);
        }
    }
}
