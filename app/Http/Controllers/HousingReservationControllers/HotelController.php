<?php

namespace App\Http\Controllers\HousingReservationControllers;

use App\Modules\HousingReservation\Hotel;
use App\Modules\HousingReservation\Room;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Modules\Others\History;
use App\User;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$hotels = Hotel::all();
        $params = $this->validate(request(), [
                'zona_id' => 'required|integer',
                'personas' => 'required|integer',
                'fecha-entrada-housing' => 'required|date',
                'fecha-salida-housing' => 'required|date'
            ]);

        //request()->session()->put('busqueda.hotels', $params);
        //dd($params['zona_id']);
        $hotels = Hotel::where('ciudad_id','=', $params['zona_id'])->get();
        //dd($hotels);         
        request()->session()->put('busqueda.hotels', $params);
        return view('modules.housingReservation.hotel.index', compact('hotels'));
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
        Hotel::create($request->all());

        /* Guardar en el historial */
        $user_id = Crypt::decrypt($request->actual_user_id); 
        $actual_user = User::findOrFail($user_id);
        History::create([
            'user_id' => $actual_user->id,
            'action' => 'El usuario '.$actual_user->name.' ha agregado el hotel ID: '.$vehicle->id.' Nombre: '.$hotel->nombre,
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Hotel::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hotel $hotel)
    {
         if ($hotel->exists()) {
            return view('modules.housingReservation.hotel.edit', compact('hotel'));
        } else {
            $response = ['error' => 'No es posible editar una id que no existe'];
            return redirect('/hotel')->with($response);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $hotel = Hotel::find($id);
        $hotel->fill($this->validate($request, [
            'nombre' => 'required',
            'pais' => 'required',
            'direccion' => 'required',
            'estrellas' => 'required',
            'valoracion' => 'required',
            'capacidad' => 'required',
        ]))->save();

        /* Guardar en el historial */
        $user_id = Crypt::decrypt($request->actual_user_id); 
        $actual_user = User::findOrFail($user_id);
        History::create([
            'user_id' => $actual_user->id,
            'action' => 'El usuario '.$actual_user->name.' ha actualizado el hotel ID: '.$vehicle->id.' Nombre: '.$hotel->nombre,
        ]);
        
            return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hotel  $hotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $hotel = Hotel::findOrFail($id);

        /* Guardar en el historial */
        $user_id = Crypt::decrypt($request->actual_user_id); 
        $actual_user = User::findOrFail($user_id);
        History::create([
            'user_id' => $actual_user->id,
            'action' => 'El usuario '.$actual_user->name.' ha eliminado el hotel ID: '.$vehicle->id.' Nombre: '.$hotel->nombre,
        ]);

        $hotel->delete();
        return back();
    }
}
