<?php

namespace App\Http\Controllers\HousingReservationControllers;

use App\Modules\HousingReservation\HotelRoom;
use App\Modules\HousingReservation\Hotel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HotelRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotel_id = request('hotel_id');
        //dump($hotel_id);
        $params = request()->session()->get('busqueda.hotels');
        $hab_disp = HotelRoom::buscarHabitacion($params, $hotel_id);
        
        //dd($hab_disp);
        // $hab_disp = HotelRoom::all()->where('hotel_id', request('hotel_id'));
        if(count($hab_disp)>0)
        {
            return view('modules.housingReservation.hotelRoom.index', compact('hab_disp'));
        }
        else{
            return view('modules.housingReservation.hotelRoom.noDisp');
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
        return HotelRoom::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HotelRoom  $hotelRoom
     * @return \Illuminate\Http\Response
     */
    public function show(HotelRoom $hotelRoom)
    {
        return HotelRoom::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HotelRoom  $hotelRoom
     * @return \Illuminate\Http\Response
     */
    public function edit(HotelRoom $hotelRoom)
    {
        if ($hotelRoom->exists()) {
            return view('modules.housingReservation.hotelRoom.edit', compact('habitacionHotel'));
        } else {
            $response = ['error' => 'No es posible editar una id que no existe'];
            return redirect('/habitacionHotels')->with($response);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HotelRoom  $hotelRoom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hotelRoom = HotelRoom::find($id);
        $hotelRoom->fill($this->validate($request, [
            'hotel_id' => 'required',
            'calendario_alojamiento_id' => 'required',
            'capacidad' => 'required',
            'camas' => 'required',
            'numero' => 'required',
        ]))->save();
        
            return 'Actualizado con éxito!';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HotelRoom  $hotelRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotelRoom = HotelRoom::findOrFail($id);
        $hotelRoom->delete();
        return "eliminado";
    }
}
