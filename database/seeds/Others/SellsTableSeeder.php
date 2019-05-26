<?php

use Illuminate\Database\Seeder;
use App\Modules\Others\Sell;

class SellsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sell::class, 5)->create();
    }
}
