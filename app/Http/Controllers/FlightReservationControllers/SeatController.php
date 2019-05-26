<?php

namespace App\Http\Controllers\FlightReservationControllers;

use App\Modules\FlightReservation\Seat;
use App\Modulos\ReservaVuelo\FlightDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $flightDetail = FlightDetail::all()->where('vuelo_id', request('vuelo_id'));

        
        if(count($flightDetail)>0)
        {
        return view('modules.flightReservation.seat.index', compact('flightDetail'));
        }
        //Realizar esto con un modal/pop-up
        else{
            return view('nodisp');
        }
        
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
        return Seat::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Seat::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function edit(Seat $seat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $seat = Seat::find($id);
        $seat->fill($this->validate($request, [
            'avion_id'=> 'required',
            'numero' => 'required',
            'letra' => 'required',
            'tipo' => 'required',
            'clase' => 'required',
            'disponible' => 'required',
          ]))->save();

        return "se ha actualizado";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seat $seat)
    {
        $seat = Asiento::findOrFail($id);
        $seat->delete();
        return "eliminado";
    }
}
