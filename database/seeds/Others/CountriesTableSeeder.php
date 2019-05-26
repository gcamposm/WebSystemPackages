<?php


use Illuminate\Database\Seeder;
use App\Modules\Others\Country;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Country::class, 10)->create();
    }
}
