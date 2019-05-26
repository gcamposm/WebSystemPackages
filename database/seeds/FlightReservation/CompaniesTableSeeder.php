<?php

use Illuminate\Database\Seeder;
use App\Modules\FlightReservation\Company;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Company::class, 20)->create();
    }
}
