<?php

namespace App\Http\Controllers\FlightReservationControllers;

use App\Modules\FlightReservation\RoundtripFlight;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoundtripFlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $params = $this->validate(request(), [
            'origen' => 'required|integer',
            'destino' => 'required|integer',
            'fechaida2' => 'required|date',
            'fechavuelta' => 'required',//_if:tipo_vuelo,1|nullable',
            'pasajeros' => 'required|integer',
            //'pasajeros_ninos' => 'required|integer',
            'cabina' => 'required|integer|between:1,3',
            //'cabina' => 'required',
        ]);
        
        $roundtrips = RoundtripFlight::buscarVuelosIdaVuelta($params);
        //dump($flight);
        request()->session()->put('busqueda.roundtrip', $params);
        $cabina = $params['cabina'];
        if(count($roundtrips)>0)
        {
            return view('modules.flightReservation.roundtrip.roundtrip', compact('roundtrips', 'cabina'));
        }
        else{
            return view('modules.flightReservation.flightdetail.noDisp');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RoundtripFlight  $roundtripFlight
     * @return \Illuminate\Http\Response
     */
    public function show(RoundtripFlight $roundtripFlight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RoundtripFlight  $roundtripFlight
     * @return \Illuminate\Http\Response
     */
    public function edit(RoundtripFlight $roundtripFlight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RoundtripFlight  $roundtripFlight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoundtripFlight $roundtripFlight)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RoundtripFlight  $roundtripFlight
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoundtripFlight $roundtripFlight)
    {
        //
    }
}
