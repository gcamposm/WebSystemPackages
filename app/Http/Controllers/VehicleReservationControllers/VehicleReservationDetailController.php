<?php

namespace App\Http\Controllers\VehicleReservationControllers;

use App\Modules\VehicleReservation\VehicleReservationDetail;
use App\Modules\VehicleReservation\Vehicle;
use App\Modules\VehicleReservation\Zone;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VehicleReservationDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zones = Zone::where('id', request('zona_id'))->pluck('id');
        $vehicles = Vehicle::whereIn('zona_id', $zones)
            ->get();
        return view('modules.vehicleReservation.vehicleReservationDetail.index', compact('vehicles'));
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
        return VehicleReservationDetail::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VehicleReservationDetail  $vehicleReservationDetail
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return VehicleReservationDetail::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VehicleReservationDetail  $vehicleReservationDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleReservationDetail $vehicleReservationDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VehicleReservationDetail  $vehicleReservationDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vehicleReservationDetail = VehicleReservationDetail::find($id);
        $vehicleReservationDetail->fill($this->validate($request, [
            'id_reserva_vehiculo' => 'required',
            'patente' => 'required',
            'fecha_retiro' => 'required',
            'fecha_regreso' => 'required',
            'precio_reserva' => 'required',
            'descuento' => 'required',
            'cantidad' => 'required',
        ]))->save();

        return "Me he acutalizado correctamente! :D!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VehicleReservationDetail  $vehicleReservationDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicleReservationDetail = VehicleReservationDetail::find($id);
        $vehicleReservationDetail->delete();
        return "lo eliminé";
    }
}
