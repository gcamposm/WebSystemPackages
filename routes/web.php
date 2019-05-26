<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();


Route::get('/prueba', function () {
    return view('prueba');
});

Route::get('/', 'HomeController@index')->name('home');
/* Packages */
Route::get('/packageva', 'OthersControllers\PackageController@va')->name('package.va');
Route::get('/packagevv', 'OthersControllers\PackageController@vv')->name('package.vv');
Route::get('/packagevav', 'OthersControllers\PackageController@vav')->name('package.vav');
Route::get('/flight', 'FlightReservationControllers\FlightController@index')->name('flight.index');

/* Cart */
Route::get('/cart', 'OthersControllers\CartController@index')->name('cart.index');
Route::patch('/cart/{product}', 'OthersControllers\CartController@update')->name('cart.update');
Route::delete('/cart/{product}', 'OthersControllers\CartController@destroy')->name('cart.destroy');
Route::post('/cartflight/{vuelo}', 'OthersControllers\CartController@storeFlights')->name('cart.storeFlights');
Route::post('/cartpackage/{package}', 'OthersControllers\CartController@storePackage')->name('cart.storePackage');
Route::post('/cartroundtrip/{roundtrip}', 'OthersControllers\CartController@storeRoundTrip')->name('cart.storeRoundTrip');
Route::post('/cartvehicle/{vehicle}', 'OthersControllers\CartController@storeVehicle')->name('cart.storeVehicle');
Route::post('/cartRoom/{hab}', 'OthersControllers\CartController@storeRoom')->name('cart.storeRoom');
Route::post('/cartInsurance/{insurance}', 'OthersControllers\CartController@storeInsurance')->name('cart.storeInsurance');
// Route::post('/cart', 'CartController@storeHousing')->name('cart.storeHousing');

/* Insurance */
Route::get('/insuranceo', 'OthersControllers\InsuranceController@indexo');
Route::get('/insurancet', 'OthersControllers\InsuranceController@indext');

/* Sell Detail */
Route::get('/selldetail/{sell}', 'OthersControllers\ProfileController@showSellDetail')->name('profile.showSellDetail');

/* Admin Group */
Route::group(['middleware' => ['auth', 'admin']], function() {

    Route::get('/admin', 'AdminController@index')->name('admin');


    /* Vehiculos */
    Route::resources([
        '/admin/service_and_provider'         => 'VehicleReservationControllers\ServiceAndProviderController',
        '/admin/vehicle_service'              => 'VehicleReservationControllers\VehicleServiceController',
        '/admin/vehicle_calendary'            => 'VehicleReservationControllers\VehicleCalendaryController',
        '/admin/vehicle'                      => 'VehicleReservationControllers\VehicleController',
        '/admin/vehicle_provider'             => 'VehicleReservationControllers\VehicleProviderController',
        '/admin/vehicleReservation'          => 'VehicleReservationControllers\VehicleReservationController',
        '/admin/vehicleReservationDetail'   => 'VehicleReservationControllers\VehicleReservationDetailController',
        '/admin/vehicle_service'              => 'VehicleReservationControllers\VehicleServiceController',
        '/admin/zone'                         => 'VehicleReservationControllers\ZoneController',
    ]);

    /* Vuelos */
    Route::resources([
        '/admin/airport'                      => 'FlightReservationControllers\AirportController',
        '/admin/checkin'                      => 'FlightReservationControllers\CheckInController',
        '/admin/company'                      => 'FlightReservationControllers\CompanyController',
        '/admin/flight'                       => 'FlightReservationControllers\FlightController',
        '/admin/flightDetail'                => 'FlightReservationControllers\FlightDetailController',
        '/admin/flightReservation'           => 'FlightReservationControllers\FlightReservationController',
        '/admin/flightSellDetail'           => 'FlightReservationControllers\FlightSellDetailController',
        '/admin/origin_destiny'               => 'FlightReservationControllers\OrigenDestinoController',
        '/admin/seat'                         => 'FlightReservationControllers\AsientoController',
        // '/admin/aviones'                       => 'FlightReservationControllers\AvionController',     
    ]);

    /* Alojamiento */
    Route::resources([
        '/admin/hotel'                        => 'HousingReservationControllers\HotelController',
        '/admin/hotelReservation'            => 'HousingReservationControllers\HotelReservationController',
        '/admin/hotelReservationDetail'     => 'HousingReservationControllers\HotelReservationDetailController',
        '/admin/hotelRoom'                   => 'HousingReservationControllers\HotelRoomController',
        '/admin/housing_and_service'          => 'HousingReservationControllers\HousingAndServiceController',
        '/admin/housing_calendary'            => 'HousingReservationControllers\HousingCalendaryController',
        '/admin/housing_service'              => 'HousingReservationControllers\HousingServiceController',
        '/admin/private_housing'              => 'HousingReservationControllers\PrivateHousingController',
        '/admin/room'                         => 'HousingReservationControllers\RoomController',
        '/admin/service_and_room'             => 'HousingReservationControllers\ServiceAndRoomController',
    ]);

    /* Otros */
    Route::resources([
        '/admin/package'                      => 'OthersControllers\PackageController',
        '/admin/packageReservation'                      => 'OthersControllers\PackageController',
        '/admin/sell'                         => 'OthersControllers\SellController',
        '/admin/insurance'                    => 'OthersControllers\InsuranceController',
        '/admin/insuranceReservation'         => 'OthersControllers\InsuranceReservationController',
        '/admin/history'                      => 'OthersControllers\HistoryController',
        ]);
    
    Route::patch('/upuser/{id}', 'AdminController@upgradeToAdmin')->name('admin.upuser');
    Route::patch('/downuser/{id}', 'AdminController@downgradeAdmin')->name('admin.downuser');
    Route::delete('/deleteuser/{id}', 'AdminController@destroyUser')->name('admin.deleteuser');

});

/* User Group */
Route::group(['middleware' => 'auth'], function() {

    

    Route::resources([
        'checkout'                     => 'OthersControllers\CheckoutController',
        'profile'                      => 'OthersControllers\ProfileController',                   
        /* Vehículo */
        'vehicle_reservation'          => 'VehicleReservationControllers\VehicleReservationController',
        'vehicle_reservation_detail'   => 'VehicleReservationControllers\VehicleReservationDetailController',
        /* Vuelo */
        'flight_reservation'           => 'FlightReservationControllers\FlightReservationController',
        'flight_sell_detail'           => 'FlightReservationControllers\FlightSellDetailController',
        /* Alojamiento */
        'hotel_reservation'            => 'HousingReservationControllers\HotelReservationController',
        'hotel_reservation_detail'     => 'HousingReservationControllers\HotelReservationDetailController',
    ]);

});

/* Vehiculos */
Route::resources([
    'service_and_provider'         => 'VehicleReservationControllers\ServiceAndProviderController',
    'vehicle_service'              => 'VehicleReservationControllers\VehicleServiceController',
    'vehicle_calendary'            => 'VehicleReservationControllers\VehicleCalendaryController',
    'vehicle'                      => 'VehicleReservationControllers\VehicleController',
    'vehicle_provider'             => 'VehicleReservationControllers\VehicleProviderController',
    'vehicle_service'              => 'VehicleReservationControllers\VehicleServiceController',
    'zone'                         => 'VehicleReservationControllers\ZoneController',
]);

/* Vuelos */
Route::resources([
    'airport'                      => 'FlightReservationControllers\AirportController',
    'checkin'                      => 'FlightReservationControllers\CheckInController',
    'company'                      => 'FlightReservationControllers\CompanyController',
    'roundtrip'                    => 'FlightReservationControllers\RoundtripFlightController',
    //'flight'                       => 'FlightReservationControllers\FlightController',
    'flight_detail'                => 'FlightReservationControllers\FlightDetailController',
    'origin_destiny'               => 'FlightReservationControllers\OrigenDestinoController',
    'seat'                         => 'FlightReservationControllers\AsientoController',
    // '/aviones'                       => 'FlightReservationControllers\AvionController',  
    'insurance'                    => 'OthersControllers\InsuranceController',   
]);    

/* Alojamiento */
Route::resources([
    'hotel'                        => 'HousingReservationControllers\HotelController',
    'hotel_room'                   => 'HousingReservationControllers\HotelRoomController',
    'housing_and_service'          => 'HousingReservationControllers\HousingAndServiceController',
    'housing_calendary'            => 'HousingReservationControllers\HousingCalendaryController',
    'housing_service'              => 'HousingReservationControllers\HousingServiceController',
    'private_housing'              => 'HousingReservationControllers\PrivateHousingController',
    'room'                         => 'HousingReservationControllers\RoomController',
    'service_and_room'             => 'HousingReservationControllers\ServiceAndRoomController',
]);

/* Otros */
Route::resources([
    'package'                      => 'OthersControllers\PackageController',
    'sell'                         => 'OthersControllers\SellController',
    'confirmation'                 => 'OthersControllers\BuyConfirmationController',
    // 'users'                        => 'OthersControllers\UserController',
]);
