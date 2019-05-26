<?php

namespace App\Http\Controllers\HousingReservationControllers;

use App\Modules\HousingReservation\ServiceAndRoom;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceAndRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ServiceAndRoom::all();
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
        return ServiceAndRoom::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ServiceAndRoom  $serviceAndRoom
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ServiceAndRoom::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ServiceAndRoom  $serviceAndRoom
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceAndRoom $serviceAndRoom)
    {
        if ($serviceAndRoom->exists()) {
            return view('modules.housingReservation.serviceAndRoom.edit', compact('habitacionServicio'));
        } else {
            $response = ['error' => 'No es posible editar una id que no existe'];
            return redirect('/serviceAndRooms')->with($response);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServiceAndRoom  $serviceAndRoom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $serviceAndRoom = ServiceAndRoom::find($id);
        $serviceAndRoom->fill($this->validate($request, [
            'servicio_alojamiento_id' => 'required',
            'habitacion_hotel_id' => 'required',
        ]))->save();
        
            return 'Actualizado con éxito!';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServiceAndRoom  $serviceAndRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serviceAndRoom = ServiceAndRoom::findOrFail($id);
        $serviceAndRoom->delete();
        return "eliminado";
    }
}
