<?php

namespace App\Http\Controllers\FlightReservationControllers;

use App\Modules\FlightReservation\Airport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AirportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Airport::all();
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
        return Airport::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Airport::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function edit(Airport $airport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Airport  $airport
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
    {
        $airport = Airport::find($id);
        $airport->fill($this->validate($request, [
            'pais' => 'required',
            'ciudad' => 'required',
            'direccion' => 'required',
            'nombre' => 'required'
          ]))->save();     

        return "se ha actualizado";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $airport = Airport::findOrFail($id);
        $airport->delete();
        return "eliminado";
    }
}
