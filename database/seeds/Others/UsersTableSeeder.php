<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 30)->create();

        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.cl',
            'password' => '$2y$10$WSOF2xVdqFqbjZDCppkOKe1K6bMPnJiw6631jrrRkdeFb13jnaKyK', //admin
            'is_admin' => 1
        ]);

        User::create([
            'name' => 'Omar Carrasco',
            'email' => 'omar.carrasco@usach.cl',
            'password' => '$2y$10$WSOF2xVdqFqbjZDCppkOKe1K6bMPnJiw6631jrrRkdeFb13jnaKyK', //admin
            'is_admin' => 1
        ]);

        User::create([
            'name' => 'Eduardo Peilemilla',
            'email' => 'eduardo.pailemilla@usach.cl',
            'password' => '$2y$10$WSOF2xVdqFqbjZDCppkOKe1K6bMPnJiw6631jrrRkdeFb13jnaKyK',
            'is_admin' => 1,//admin
        ]);

        User::create([
            'name' => 'Guillermo Campos',
            'email' => 'guillermo.campos@usach.cl',
            'password' => '$2y$10$WSOF2xVdqFqbjZDCppkOKe1K6bMPnJiw6631jrrRkdeFb13jnaKyK', //admin
            'is_admin' => 1
        ]);
    }
}
