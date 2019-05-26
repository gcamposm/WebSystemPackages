<?php

namespace App\Http\Controllers\FlightReservationControllers;

use App\Modules\FlightReservation\FlightReservation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FlightReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FlightReservation::all();
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
        return FlightReservation::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FlightReservation  $flightReservation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return FlightReservation::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FlightReservation  $flightReservation
     * @return \Illuminate\Http\Response
     */
    public function edit(FlightReservation $flightReservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FlightReservation  $flightReservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $flightReservation = FlightReservation::find($id);
        $flightReservation->fill($this->validate($request, [
            'vuelo_id' => 'required',
            'tipo' => 'required',
            'fecha' => 'required',
            'precio' => 'required',
        ]))->save();

        return "Me he acutalizado correctamente! :D!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FlightReservation  $flightReservation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flightReservation = FlightReservation::find($id);
        $flightReservation->delete();
        return "lo eliminé";
    }
}
