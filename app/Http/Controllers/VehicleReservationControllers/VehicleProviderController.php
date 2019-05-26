<?php

namespace App\Http\Controllers\VehicleReservationControllers;

use App\Modules\VehicleReservation\VehicleProvider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VehicleProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return VehicleProvider::all();
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
        return VehicleProvider::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\VehicleProvider  $vehicleProvider
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return VehicleProvider::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VehicleProvider  $vehicleProvider
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleProvider $vehicleProvider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VehicleProvider  $vehicleProvider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vehicleProvider = VehicleProvider::find($id);
        $vehicleProvider->fill($this->validate($request, [
            'politica_combustible' => 'required',
            'documentacion_necesaria' => 'required',
            'franquicia_daños' => 'required',
            'calificacion' => 'required',
            'deposito_seguridad' => 'required',
            'kilometraje' => 'required',
        ]))->save();

        return "Me he acutalizado correctamente! :D!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VehicleProvider  $vehicleProvider
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
        $vehicleProvider = VehicleProvider::find($id);
        $vehicleProvider->delete();
        return "lo eliminé";
    }
}
