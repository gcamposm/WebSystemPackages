<?php

namespace App\Http\Controllers\FlightReservationControllers;

use App\Modules\FlightReservation\CheckIn;
use App\Http\Controllers\Controller;
use App\Modules\FlightReservation\Flight;
use App\Modules\FlightReservation\FlightDetail;
use App\Modules\FlightReservation\FlightSellDetail;
use App\Modules\FlightReservation\RoundtripFlight;
use App\Modules\FlightReservation\Seat;
use App\Modules\Others\Sell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CheckIn::all();
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
        //dd($request['source']);
        $venta = Sell::where('source', '=', $request['source'])->first();
        $checkin = CheckIn::where('source', '=', $request['source'])->first();
        //dd($venta);
        $validador = false;
        if($venta == null or $checkin != null or $venta->user_id != Auth::user()->id)
        {
            /** poner algo bonito */
            return view('modules.others.checkin.noDisp');
        }
        else{
            $detalles_venta = FlightSellDetail::where('sell_id', '=', $venta->id)->get();
            //dd($detalles_venta);
            foreach ($detalles_venta as $detalle)
            {
                //dump($detalle);
                if($detalle->flight_id != null) {
                    $validador = true;
                    $tipo = $detalle->tipo;
                    $vuelo = Flight::findOrFail($detalle->flight_id);
                    if ($vuelo->escalas == 1) {
                        //dump("aqui");
                        $tramo1 = $vuelo->getTramo1;
                        $asientos = $tramo1->getAsientos($tipo);
                        Seat::ocupar($asientos, $detalle->cantidad, Auth::user()->id, $request['source']);
                        //dump($asientos);
                    } else if ($vuelo->escalas == 2) {
                        $tramo1 = $vuelo->getTramo1;
                        $tramo2 = $vuelo->getTramo1;
                        $asientos1 = $tramo1->getAsientos($tipo);
                        $asientos2 = $tramo2->getAsientos($tipo);
                        Seat::ocupar($asientos1, $detalle->cantidad, Auth::user()->id, $request['source']);
                        Seat::ocupar($asientos2, $detalle->cantidad, Auth::user()->id, $request['source']);
                        //dump($asientos1);
                        //dump($asientos2);
                    }
                }
                else if($detalle->roundtrip_id != null){
                    $validador = true;
                    $tipo = $detalle->tipo;
                    $vuelo = RoundtripFlight::findOrFail($detalle->roundtrip_id);
                    if ($vuelo->vueloIda->escalas == 1) {
                        //dump("aqui");
                        $tramo1 = $vuelo->vueloIda->getTramo1;
                        $asientos = $tramo1->getAsientos($tipo);
                        Seat::ocupar($asientos, $detalle->cantidad, Auth::user()->id, $request['source']);
                        //dump($asientos);
                    } else if ($vuelo->vueloIda->escalas == 2) {
                        $tramo1 = $vuelo->vueloIda->getTramo1;
                        $tramo2 = $vuelo->vueloIda->getTramo2;
                        $asientos1 = $tramo1->getAsientos($tipo);
                        $asientos2 = $tramo2->getAsientos($tipo);
                        Seat::ocupar($asientos1, $detalle->cantidad, Auth::user()->id, $request['source']);
                        Seat::ocupar($asientos2, $detalle->cantidad, Auth::user()->id, $request['source']);
                        //dump($asientos1);
                        //dump($asientos2);
                    }
                    if ($vuelo->vueloVuelta->escalas == 1) {
                        //dump("aqui");
                        $tramo1 = $vuelo->vueloVuelta->getTramo1;
                        $asientos = $tramo1->getAsientos($tipo);
                        Seat::ocupar($asientos, $detalle->cantidad, Auth::user()->id, $request['source']);
                        //dump($asientos);
                    } else if ($vuelo->vueloVuelta->escalas == 2) {
                        $tramo1 = $vuelo->vueloVuelta->getTramo1;
                        $tramo2 = $vuelo->vueloVuelta->getTramo2;
                        $asientos1 = $tramo1->getAsientos($tipo);
                        $asientos2 = $tramo2->getAsientos($tipo);
                        Seat::ocupar($asientos1, $detalle->cantidad, Auth::user()->id, $request['source']);
                        Seat::ocupar($asientos2, $detalle->cantidad, Auth::user()->id, $request['source']);
                        //dump($asientos1);
                        //dump($asientos2);
                    }
                }
            }
            
            //FINAL FOREACH

            //dd($id_vuelo);
        }
        if($validador == true)
        {
            return view('modules.others.checkin.confirmation');
        }
        //return CheckIn::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modulos\ReservaVuelo\CheckIn  $checkIn
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return CheckIn::findOrFail($id);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modulos\ReservaVuelo\CheckIn  $checkIn
     * @return \Illuminate\Http\Response
     */
    public function edit(CheckIn $checkIn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modulos\ReservaVuelo\CheckIn  $checkIn
     * @return \Illuminate\Http\Response
     */
public function update(Request $request, $id)
    {
        $checkIn = CheckIn::find($id);
        $checkIn->fill($this->validate($request, [
            'asiento_id' => 'required',
            'user_id' => 'required',
            'fecha' => 'required',
            'estado' => 'required'
          ]))->save();

        return "se ha actualizado";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modulos\ReservaVuelo\CheckIn  $checkIn
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $checkIn = CheckIn::findOrFail($id);
        $checkIn->delete();
        return "eliminado";
    }
}
