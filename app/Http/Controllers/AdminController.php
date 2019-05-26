<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Modules\VehicleReservation\VehicleReservationDetail;
use App\Modules\VehicleReservation\VehicleReservation;
use App\Modules\VehicleReservation\VehicleProvider;
use App\Modules\VehicleReservation\Vehicle;
use App\Modules\VehicleReservation\Zone;
use App\Modules\HousingReservation\Hotel;
use App\Modules\HousingReservation\HotelReservation;
use App\Modules\HousingReservation\HotelReservationDetail;
use App\Modules\HousingReservation\HotelRoom;
use App\Modules\FlightReservation\Flight;
use App\Modules\FlightReservation\FlightDetail;
use App\Modules\FlightReservation\FlightSellDetail;
use App\Modules\FlightReservation\Airport;
use App\Modules\Others\Insurance;
use App\Modules\Others\InsuranceReservation;
use App\Modules\Others\Package;
use App\Modules\Others\PackageReservation;
use Illuminate\Support\Facades\Crypt;
use App\Modules\Others\History;
use App\User;

class AdminController extends Controller
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
        $vehicles = Vehicle::all();
        $vehicleReservations = VehicleReservation::all();
        $vehicleReservationDetails = VehicleReservationDetail::all();
        $vehicleProviders = VehicleProvider::all();
        $zones = Zone::all();

        $hotels = Hotel::all();
        $hotelRooms = HotelRoom::all();
        $hotelReservations = HotelReservation::all();
        $hotelReservationDetails = HotelReservationDetail::all();

        $airports = Airport::all();
        $flights = Flight::all();
        $flightDetails = FlightDetail::all();
        $flightSellDetails = FlightSellDetail::all();

        $insurances = Insurance::all();
        $insuranceReservations = InsuranceReservation::all();

        $packages = Package::all();
        $packageReservations = PackageReservation::all();

        $users = User::all();

        return view('admin.index', compact(
            'vehicleReservationDetails',
            'vehicleReservations',
            'vehicleProviders',
            'vehicles',
            'zones',
            'airports',
            'flights',
            'flightDetails',
            'flightSellDetails',
            'hotels',
            'hotelRooms',
            'hotelReservations',
            'hotelReservationDetails',
            'packages',
            'packageReservations',
            'insurances',
            'insuranceReservations',
            'users'
        ));
    }

    public function upgradeToAdmin(Request $request, $id)
    {
        /* Usuario modificado */
        $realId = Crypt::decrypt($id);  
        $user = User::findOrFail($realId);
        $user->is_admin = 1;
        $user->save();

        /* Guardar en el historial */
        $user_id = Crypt::decrypt($request->actual_user_id); 
        $actual_user = User::findOrFail($user_id);
        History::create([
            'user_id' => $actual_user->id,
            'action' => 'El usuario '.$actual_user->name.' ha convertido en administrador a '.$user->name,
        ]);


        return back();
    }

    public function downgradeAdmin(Request $request, $id)
    {

        /* Usuario modificado */
        $realId = Crypt::decrypt($id);  
        $user = User::findOrFail($realId);
        $user->is_admin = 0;
        $user->save();

        /* Guardar en el historial */
        $user_id = Crypt::decrypt($request->actual_user_id); 
        $actual_user = User::findOrFail($user_id);
        History::create([
            'user_id' => $actual_user->id,
            'action' => 'El usuario '.$actual_user->name.' le ha quitado privilegios de administración a '.$user->name,
        ]);

        return back();
    }

    public function destroyUser(Request $request, $id)
    {
        /* Usuario modificado */
        $realId = Crypt::decrypt($id);  
        $user = User::findOrFail($realId);
        $user->delete();

        /* Guardar en el historial */
        $user_id = Crypt::decrypt($request->actual_user_id); 
        $actual_user = User::findOrFail($user_id);
        History::create([
            'user_id' => $actual_user->id,
            'action' => 'El usuario '.$actual_user->name.' ha eliminado a '.$user->name,
        ]);

        return back();
    }

}
