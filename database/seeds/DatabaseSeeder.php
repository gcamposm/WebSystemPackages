<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            /* General */
            UsersTableSeeder::class,
            SellsTableSeeder::class,

            /* Dirección */
            CountriesTableSeeder::class,
            CitiesTableSeeder::class,

            /* Vuelos */
            AirportsTableSeeder::class,
            CompaniesTableSeeder::class,
            FlightDetailsTableSeeder::class,
            FlightsTableSeeder::class,
            FlightSellDetailsTableSeeder::class,
            SeatsTableSeeder::class,
            //CheckInsTableSeeder::class,
            OriginDestiniesTableSeeder::class,
            FlightReservationsTableSeeder::class,
            RoundtripsFlightsSeeder::class,
            //SeatsTableSeeder::class,

            /* Vehiculos */
            VehicleCalendariesTableSeeder::class,
            ZonesTableSeeder::class,
            VehicleProvidersTableSeeder::class,
            VehiclesTableSeeder::class,
            //VehicleReservationsTableSeeder::class,
            //VehicleReservationDetailsTableSeeder::class,
            //VehicleServicesTableSeeder::class,
            //ServiceAndVehiclesTableSeeder::class,
            //ServiceAndProvidersTableSeeder::class,


            /* Hoteles */
            HotelsTableSeeder::class,
            HousingServicesTableSeeder::class,
            HotelRoomsTableSeeder::class,
            HotelReservationsTableSeeder::class,
            HousingCalendariesTableSeeder::class,
            PrivateHousingsTableSeeder::class,
            RoomsTableSeeder::class,
            HousingAndServicesTableSeeder::class,
            ServiceAndRoomsTableSeeder::class,
            //HotelReservationDetailsTableSeeder::class,

            /* Seguros */
            InsurancesTableSeeder::class,

            /* Paquetes */
            //PackagesTableSeeder::class,

            /* Cart */
            CartsTableSeeder::class,
        ]);
    }
}
