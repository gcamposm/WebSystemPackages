<?php

use Illuminate\Database\Seeder;
use App\Modules\Others\Insurance;

class InsurancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Insurance::class, 500)->create();
    }
}
