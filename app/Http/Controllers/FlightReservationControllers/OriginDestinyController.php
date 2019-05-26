<?php

namespace App\Http\Controllers\FlightReservationControllers;

use App\Modules\FlightReservation\OriginDestiny;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OriginDestinyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OriginDestiny::all();
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
        return OriginDestiny::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OriginDestiny  $originDestiny
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return OriginDestiny::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OriginDestiny  $originDestiny
     * @return \Illuminate\Http\Response
     */
    public function edit(OriginDestiny $originDestiny)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OriginDestiny  $originDestiny
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $originDestiny = OriginDestiny::find($id);
        $originDestiny->fill($this->validate($request, [
            'detalle_vuelo_id' => 'required',
            'aeropuerto_id' => 'required'
          ]))->save();

        return "se ha actualizado";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OriginDestiny  $originDestiny
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $originDestiny = OriginDestiny::findOrFail($id);
        $originDestiny->delete();
        return "eliminado";
    }
}
