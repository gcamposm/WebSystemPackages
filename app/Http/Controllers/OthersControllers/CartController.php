<?php

namespace App\Http\Controllers\OthersControllers;

use App\Modules\FlightReservation\Flight;
use App\Modules\FlightReservation\RoundtripFlight;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Modules\FlightReservation\FlightDetail;
use App\Modules\VehicleReservation\Vehicle;
use App\Modules\HousingReservation\HotelRoom;
use App\Modules\Others\Insurance;
use App\Modules\Others\Package;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mightAlsoLike = FlightDetail::inRandomOrder()->take(4)->get();

        return view('modules.cart.cart')->with('mightAlsoLike', $mightAlsoLike);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Flight $vuelo
     * @return \Illuminate\Http\Response
     */
    public function storeFlights(Flight $vuelo)
    {
        // $duplicates = Cart::search(function ($cartItem, $rowId) use ($flightDetail) {
        //     return $cartItem->id === $flightDetail->id;
        // });
        // if ($duplicates->isNotEmpty()) {
        //     return redirect()->route('cart.index')->with('success_message', 'Item is already in your cart!');
        // }
        $params = request()->session()->get('busqueda.vuelos');
        if($params['cabina'] == 1)
        {
            Cart::add($vuelo->id, 'destino-santiago', $params['pasajeros'], $vuelo->precio_premium)
                ->associate('App\Modules\FlightReservation\Flight');
        }
        else if($params['cabina'] == 2)
        {
            Cart::add($vuelo->id, 'destino-santiago', $params['pasajeros'], $vuelo->precio_bussiness)
                ->associate('App\Modules\FlightReservation\Flight');
        }
        else if($params['cabina'] == 3)
        {
            Cart::add($vuelo->id, 'destino-santiago', $params['pasajeros'], $vuelo->precio_economy)
                ->associate('App\Modules\FlightReservation\Flight');
        }

         return redirect()->route('cart.index')->with('success_message', 'Se ha añadido a tu carrito!');
    }
    public function storeRoundTrip(RoundtripFlight $roundtrip)
    {
        // $duplicates = Cart::search(function ($cartItem, $rowId) use ($flightDetail) {
        //     return $cartItem->id === $flightDetail->id;
        // });
        // if ($duplicates->isNotEmpty()) {
        //     return redirect()->route('cart.index')->with('success_message', 'Item is already in your cart!');
        // }
        $params = request()->session()->get('busqueda.roundtrip');
        if($params['cabina'] == 1)
        {
            Cart::add($roundtrip->id, 'destino-santiago', $params['pasajeros'], $roundtrip->precio_premium)
                ->associate('App\Modules\FlightReservation\RoundTripFlight');
        }
        else if($params['cabina'] == 2)
        {
            Cart::add($roundtrip->id, 'destino-santiago', $params['pasajeros'], $roundtrip->precio_bussiness)
                ->associate('App\Modules\FlightReservation\RoundTripFlight');
        }
        else if($params['cabina'] == 3)
        {
            Cart::add($roundtrip->id, 'destino-santiago', $params['pasajeros'], $roundtrip->precio_economy)
                ->associate('App\Modules\FlightReservation\RoundTripFlight');
        }

        return redirect()->route('cart.index')->with('success_message', 'Se ha añadido a tu carrito!');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param Vehicle $vehicle
     * @return \Illuminate\Http\Response
     */
    public function storeVehicle(Vehicle $vehicle)
    {
        // $duplicates = Cart::search(function ($cartItem, $rowId) use ($vehicle) {
        //     return $cartItem->id === $vehicle->id;
        // });
        // if ($duplicates->isNotEmpty()) {
        //     return redirect()->route('cart.index')->with('success_message', 'Item is already in your cart!');
        // }
        $params = request()->session()->get('busqueda.vehicles');
        $id = $vehicle->id;
        request()->session()->put('busqueda.vehicle' . $id, $params);

        Cart::add($vehicle->id, 'destino-santiago', $params['pasajeros'], $vehicle->precio)
            ->associate('App\Modules\VehicleReservation\Vehicle');

         return redirect()->route('cart.index')->with('success_message', 'Se ha añadido a tu carrito!');
    }

    public function storeRoom(HotelRoom $hab)
    {
        $params = request()->session()->get('busqueda.hotels');
        $id = $hab->id;
        request()->session()->put('busqueda.room' . $id, $params);
        //$params2 = request()->session()->get('busqueda.room' . $id);
        //dd($params2);
        Cart::add($hab->id, 'destino-santiago', $params['personas'], $hab->precio)
            ->associate('App\Modules\HousingReservation\HotelRoom');

         return redirect()->route('cart.index')->with('success_message', 'Se ha añadido a tu carrito!');
    }

    public function storeInsurance(Insurance $insurance)
    {
        Cart::add($insurance->id, 'destino-santiago', 1, $insurance->price)
            ->associate('App\Modules\Others\Insurance');

         return redirect()->route('cart.index')->with('success_message', 'Se ha añadido a tu carrito!');
    }
    public function storePackage(Package $package)
    {
        //dd(":D");
        if($package->type == 1) {
            $params = request()->session()->get('busqueda.packageva');
            $id = $package->id;
            request()->session()->put('busqueda.packageva' . $id, $params);
        }
        else if($package->type == 2) {
            $params = request()->session()->get('busqueda.packagevv');
            $id = $package->id;
            request()->session()->put('busqueda.packagevv' . $id, $params);
        }
        else if($package->type == 3) {
            $params = request()->session()->get('busqueda.packagevav');
            $id = $package->id;
            request()->session()->put('busqueda.packagevav' . $id, $params);
        }
        Cart::add($package->id, 'destino-santiago', $params['pasajeros'], $package->precio)
            ->associate('App\Modules\Others\Package');

        return redirect()->route('cart.index')->with('success_message', 'Se ha añadido a tu carrito!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $validator = Validator::make($request->all(), [
        //     'quantity' => 'required|numeric|between:1,5'
        // ]);

        // if ($validator->fails()) {
        //     session()->flash('errors', collect(['Quantity must be between 1 and 5.']));
        //     return response()->json(['success' => false], 400);
        // }

        Cart::update($id, $request->quantity);
        session()->flash('success_message', 'La cantidad ha sido añadida existosamente!');
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);

        return back()->with('success_message', '¡El item fue eliminado satisfactoriamente!');
    }
}
