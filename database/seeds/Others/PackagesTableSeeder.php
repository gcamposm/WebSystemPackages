<?php

use Illuminate\Database\Seeder;
use App\Modules\Others\Package;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Package::class, 40)->create();
    }
}
