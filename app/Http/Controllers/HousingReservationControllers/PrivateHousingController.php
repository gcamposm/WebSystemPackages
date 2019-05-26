<?php

namespace App\Http\Controllers\HousingReservationControllers;

use App\Modules\HousingReservation\PrivateHousing;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrivateHousingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PrivateHousing::all();
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
        return PrivateHousing::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PrivateHousing  $privateHousing
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return PrivateHousing::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PrivateHousing  $privateHousing
     * @return \Illuminate\Http\Response
     */
    public function edit(PrivateHousing $privateHousing)
    {
        if ($alojamientoPrivado->exists()) {
            return view('modules.housingReservation.privateHousing.edit', compact('alojamientoPrivado'));
        } else {
            $response = ['error' => 'No es posible editar una id que no existe'];
            return redirect('/privateHousings')->with($response);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PrivateHousing  $privateHousing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $privateHousing = PrivateHousing::find($id);
        $privateHousing->fill($this->validate($request, [
            'calendario_alojamiento_id' => 'required',
            'capacidad' => 'required',
            'direccion' => 'required',
            'nombre' => 'required',
            'estrella' => 'required',
            'valoracion' => 'required',
            'pais' => 'required',
        ]))->save();
        
        return 'Actualizado con éxito!';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PrivateHousing  $privateHousing
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $privateHousing = PrivateHousing::findOrFail($id);
        $privateHousing->delete();
        return "eliminado";
    }
}
