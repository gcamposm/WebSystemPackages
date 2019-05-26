<?php

namespace App\Http\Controllers\HousingReservationControllers;

use App\Modules\HousingReservation\HotelReservation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use App\Modules\Others\History;
use App\User;

class HotelReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return HotelReservation::all();
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
         /*$reservaHotelData = $this->validate($request, [
            'precio' => 'required',
            'cantidad' => 'required',
            'monto_total' => 'required',
            'descuento' => 'required',
        ]);*/
        $hotelReservation = new HotelReservation();
        $hotelReservation->precio = $request->input('precio');
        $hotelReservation->cantidad = $request->input('cantidad');
        $hotelReservation->monto_total = $request->input('monto_total');
        $hotelReservation->descuento = $request->input('descuento');
        $hotelReservation->fecha = Carbon::now();
        //$hotelReservation = ReservaHotel::create($reservaHotelData);
        $hotelReservation->save();
        if ($hotelReservation->exists()) {
          $response = ['success' => 'Creado con éxito!'];
        } else {
          $response = ['error' => 'No se ha podido crear!'];
        }
        return view('Congrats');
         //return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HotelReservation  $hotelReservation
     * @return \Illuminate\Http\Response
     */
    public function show(HotelReservation $hotelReservation)
    {
        return HotelReservation::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HotelReservation  $hotelReservation
     * @return \Illuminate\Http\Response
     */
    public function edit(HotelReservation $hotelReservation)
    {
        if ($hotelReservation->exists()) {
            return view('modules.housingReservation.hotelReservation.edit', compact('hotelReservation'));
        } else {
            $response = ['error' => 'No es posible editar una id que no existe'];
            return redirect('/hotelReservations')->with($response);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HotelReservation  $hotelReservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hotelReservation = HotelReservation::find($id);
        $hotelReservation->fill($this->validate($request, [
            'id_venta' => 'required',
            'precio' => 'required',
            'fecha' => 'required',
            'cantidad' => 'required',
            'monto_total' => 'required',
            'descuento' => 'required',
        ]))->save();
            
            return 'Actualizado con éxito!';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HotelReservation  $hotelReservation
     * @return \Illuminate\Http\Response
     */
      public function destroy(Request $request, $id)
    {
        $hotelReservation = HotelReservation::findOrFail($id);

        /* Guardar en el historial */
        $user_id = Crypt::decrypt($request->actual_user_id); 
        $actual_user = User::findOrFail($user_id);
        History::create([
            'user_id' => $actual_user->id,
            'action' => 'El usuario '.$actual_user->name.' ha eliminado la reserva de hotel de Código: '.$hotelReservation->sell->source .' ID: '.$id.' Nombre: '.$hotelReservation->hotel->nombre,
        ]);

        $hotelReservation->delete();
        return "eliminado";
    }
}
