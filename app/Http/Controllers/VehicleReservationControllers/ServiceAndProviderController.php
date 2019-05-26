<?php

namespace App\Http\Controllers\VehicleReservationControllers;

use App\Modules\VehicleReservation\ServiceAndProvider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceAndProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ServiceAndProvider::all();
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
        return ServiceAndProvider::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ServiceAndProvider  $serviceAndProvider
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ServiceAndProvider::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ServiceAndProvider  $serviceAndProvider
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceAndProvider $serviceAndProvider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServiceAndProvider  $serviceAndProvider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $serviceAndProvider = ServiceAndProvider::find($id);
        $serviceAndProvider->fill($this->validate($request, [
            'servicio_id' => 'required',
            'proveedor_id' => 'required',
        ]))->save();

        return "Me he acutalizado correctamente! :D!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServiceAndProvider  $serviceAndProvider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ServiceAndProvider = ServiceAndProvider::find($id);
        $ServiceAndProvider->delete();
        return "lo eliminé";
    }
}
