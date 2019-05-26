<?php

namespace App\Http\Controllers\HousingReservationControllers;

use Carbon\Carbon;
use App\Modules\HousingReservation\HousingCalendary;
use App\Modules\HousingReservation\HotelRoom;
use App\Modules\HousingReservation\Hotel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HousingCalendaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fecha_entrada = Carbon::createFromFormat('Y-m-d', request('fecha_entrada'));
        $fecha_salida = Carbon::createFromFormat('Y-m-d', request('fecha_entrada'));
        $hab_no_disp = HotelRoom::all()->whereDate('date', '>', $fecha_entrada)
                                       ->whereDate('date', '<', $fecha_salida);
        $hab_disp = HotelRoom::all()->where('hotel_id', request('hotel_id'))
                                    ->whereNotIn($hab_no_disp);
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
        $housingCalendary = $this->validate($request, [
            'room_id' => 'required',
            'date' => 'required',
        ]);

        $housingCalendary = HousingCalendary::create($housingCalendary);

        if ($housingCalendary->exists()) {
          $response = ['success' => 'Creado con éxito!'];
        } else {
          $response = ['error' => 'No se ha podido crear!'];
        }

        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HousingCalendary  $housingCalendary
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return HousingCalendary::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HousingCalendary  $housingCalendary
     * @return \Illuminate\Http\Response
     */
    public function edit(HousingCalendary $housingCalendary)
    {
        if ($housingCalendary->exists()) {
            return view('modules.housingReservation.housingCalendary.edit', compact('housingCalendary'));
        } else {
            $response = ['error' => 'No es posible editar una id que no existe'];
            return redirect('/housingCalendaries')->with($response);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HousingCalendary  $housingCalendary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $housingCalendary = HousingCalendary::find($id);
        $housingCalendary->fill($this->validate($request, [
            'room_id' => 'required',
            'date' => 'required',
        ]))->save();
        
        return 'Actualizado con éxito!';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HousingCalendary  $housingCalendary
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $housingCalendary = HousingCalendary::findOrFail($id);
        $housingCalendary->delete();
        return "eliminado";
    }
}
