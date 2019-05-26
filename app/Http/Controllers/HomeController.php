<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Modules\VehicleReservation\Vehicle;
use App\Modules\VehicleReservation\Zone;
use App\Modules\HousingReservation\Hotel;
use App\Modules\HousingReservation\HotelRoom;
use App\Modules\FlightReservation\Airport;
use App\Modules\FlightReservation\FlightDetail;
use App\Modules\Others\City;
use App\Modules\Others\Package;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $vehicleCards = Vehicle::inRandomOrder()->take(3)->get();
        $hotelCards = HotelRoom::inRandomOrder()->take(3)->get();
        $packagesCards = Package::inRandomOrder()->take(3)->get();
        $cities = City::all();
        $zones = Zone::all();
        $hotels = Hotel::all();
        $airports = Airport::all();
        $hotelRooms = HotelRoom::all();
        $flightDetails = FlightDetail::all();
        $packages = Package::all();
        return view('home', compact(
            'zones',
            'hotels',
            'airports',
            'flightDetails',
            'hotelRooms',
            'vehicleCards',
            'hotelCards',
            'packagesCards',
            'cities',
            'packages'
        ));
    }
}
