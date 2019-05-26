<?php

namespace App\Http\Controllers\FlightReservationControllers;

use App\Modules\FlightReservation\FlightSellDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Modules\Others\History;
use App\User;

class FlightSellDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FlightSellDetail::all();
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
        return FlightSellDetail::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FlightSellDetail  $flightSellDetail
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return FlightSellDetail::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FlightSellDetail  $flightSellDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(FlightSellDetail $flightSellDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FlightSellDetail  $flightSellDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $flightSellDetail = FlightSellDetail::find($id);
        $flightSellDetail->fill($this->validate($request, [
            'venta_id' => 'required',
            'precio' => 'required',
            'descuento' => 'required',
            'monto_total' => 'required',
            'fecha' => 'required',
            'tipo' => 'required',
            'cantidad' => 'required'
          ]))->save();
      
        return "se ha actualizado";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FlightSellDetail  $flightSellDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $flightSellDetail = FlightSellDetail::findOrFail($id);

        /* Guardar en el historial */
        $user_id = Crypt::decrypt($request->actual_user_id); 
        $actual_user = User::findOrFail($user_id);
        History::create([
            'user_id' => $actual_user->id,
            'action' => 'El usuario '.$actual_user->name.' ha eliminado la reserva de vuelo de Código: '.$flightSellDetail->sell->source .' ID: '.$id,
        ]);

        $flightSellDetail->delete();

        return back();
    }
}
