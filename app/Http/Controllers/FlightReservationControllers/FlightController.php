<?php

namespace App\Http\Controllers\FlightReservationControllers;

use App\Modules\FlightReservation\Flight;
use App\Http\Controllers\Controller;
use App\Modules\FlightReservation\FlightDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Modules\Others\History;
use App\User;

class FlightController extends Controller
{
    public function index()
    {
        //if ( ! session('vuelo_vuelta')) {
            $params = $this->validate(request(), [
                'origen' => 'required|integer',
                'destino' => 'required|integer',
                'fechaida' => 'required|date',
                //'fechavuelta' => 'required',//_if:tipo_vuelo,1|nullable',
                'pasajeros' => 'required|integer',
                //'pasajeros_ninos' => 'required|integer',
                'cabina' => 'required|integer|between:1,3',
                //'cabina' => 'required',
            ]);
        //} else {
            //$params = request()->session()->get('busqueda.vuelos');
            //request()->session()->forget('vuelo_vuelta');
        //}
        $flight = Flight::buscarVuelos($params);
        request()->session()->put('busqueda.vuelos', $params);
        $cabina = $params['cabina'];
        //return view('modules.flightReservation.flight.flight', compact('vuelos'));
         if(count($flight)>0)
        {
            return view('modules.flightReservation.flight.flight', compact('flight', 'cabina'));
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
        $flight = Flight::create($request->all());

        /* Guardar en el historial */
        $user_id = Crypt::decrypt($request->actual_user_id); 
        $actual_user = User::findOrFail($user_id);
        History::create([
            'user_id' => $actual_user->id,
            'action' => 'El usuario '.$actual_user->name.' ha agregado el vuelo ID: '.$flight->id,
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Flight::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function edit(Flight $flight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $flight = Flight::find($id);
        $flight->fill($this->validate($request, [
            'precio_economy' => 'required',
            'precio_bussiness' => 'required',
            'precio_premium' => 'required',
          ]))->save();

        /* Guardar en el historial */
        $user_id = Crypt::decrypt($request->actual_user_id); 
        $actual_user = User::findOrFail($user_id);
        History::create([
            'user_id' => $actual_user->id,
            'action' => 'El usuario '.$actual_user->name.' ha actualizado el vuelo ID: '.$flight->id,
        ]);
      
          return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $flight = Flight::findOrFail($id);

        /* Guardar en el historial */
        $user_id = Crypt::decrypt($request->actual_user_id); 
        $actual_user = User::findOrFail($user_id);
        History::create([
            'user_id' => $actual_user->id,
            'action' => 'El usuario '.$actual_user->name.' ha eliminado el vuelo ID: '.$flight->id,
        ]);

        $flight->delete();
        return back();
    }
}
