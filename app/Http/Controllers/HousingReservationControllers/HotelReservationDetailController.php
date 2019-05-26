<?php

namespace App\Http\Controllers\HousingReservationControllers;

use App\Modules\housingReservation\HotelReservationDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HotelReservationDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return HotelReservationDetail::all();
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
        return HotelReservationDetail::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HotelReservationDetail  $hotelReservationDetail
     * @return \Illuminate\Http\Response
     */
    public function show(HotelReservationDetail $hotelReservationDetail)
    {
        return HotelReservationDetail::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HotelReservationDetail  $hotelReservationDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(HotelReservationDetail $hotelReservationDetail)
    {
        if ($hotelReservationDetail->exists()) {
            return view('modules.housingReservation.hotelReservationDetail.edit', compact('hotelReservationDetail'));
        } else {
            $response = ['error' => 'No es posible editar una id que no existe'];
            return redirect('/hotelReservationDetails')->with($response);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HotelReservationDetail  $hotelReservationDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hotelReservationDetail = HotelReservationDetail::find($id);
        $hotelReservationDetail->fill($this->validate($request, [
            'reserva_hotel_id' => 'required',
            'habitacion_hotel_id' => 'required',
            'alojamiento_privado_id' => 'required',
            'fecha_ingreso' => 'required',
            'fecha_egreso' => 'required',
            'precio' => 'required',
            'tipo' => 'required',
        ]))->save();
        
            return 'Actualizado con éxito!';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HotelReservationDetail  $hotelReservationDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotelReservationDetail = HotelReservationDetail::findOrFail($id);
        $hotelReservationDetail->delete();
        return "eliminado";
    }
}
