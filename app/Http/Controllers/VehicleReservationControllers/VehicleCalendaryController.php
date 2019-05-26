<?php

namespace App\Http\Controllers\VehicleReservationControllers;

use App\Modules\VehicleReservation\VehicleCalendary;
use App\Modules\VehicleReservation\Vehicle;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VehicleCalendaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $autos = Vehiculo::all()->where('id', request('auto_id'));
        // $habhotel = HabitacionHotel::all();
        // return view('confirmacionV', compact('autos'));
        return CalendarioVehiculo::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return VehicleCalendary::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VehicleCalendary  $vehicleCalendary
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return VehicleCalendary::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VehicleCalendary  $vehicleCalendary
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleCalendary $vehicleCalendary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VehicleCalendary  $vehicleCalendary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vehicleCalendary = VehicleCalendary::find($id);
        $vehicleCalendary->fill($this->validate($request, [
            'año' => 'required',
            'mes' => 'required',
            'dia' => 'required',
        ]))->save();

        return "Me he acutalizado correctamente! :D!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VehicleCalendary  $vehicleCalendary
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicleCalendary = VehicleCalendary::find($id);
        $vehicleCalendary->delete();
        return "lo eliminé";
    }
}
