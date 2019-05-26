<?php

namespace App\Http\Controllers\VehicleReservationControllers;

use App\Modules\VehicleReservation\VehicleService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VehicleServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return VehicleService::all();
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
        return VehicleService::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VehicleService  $vehicleService
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return VehicleService::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VehicleService  $vehicleService
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleService $vehicleService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VehicleService  $vehicleService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vehicleService = VehicleService::find($id);
        $vehicleService->fill($this->validate($request, [
            'nombre_servicio' => 'required',
            'duracion' => 'required',
        ]))->save();

        return "Me he acutalizado correctamente! :D!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VehicleService  $vehicleService
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vehicleService = VehicleService::find($id);
        $vehicleService->delete();
        return "lo eliminé";
    }
}
