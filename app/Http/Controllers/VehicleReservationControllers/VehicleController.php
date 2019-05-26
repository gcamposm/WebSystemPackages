<?php

namespace App\Http\Controllers\VehicleReservationControllers;

use App\Modules\VehicleReservation\Vehicle;
use App\Modules\VehicleReservation\Zone;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Modules\Others\History;
use App\User;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(":D");
        $params = $this->validate(request(), [
                'pasajeros'=> 'required|integer',
                'zone' => 'required|integer',
                'fecha-recogida' => 'required|date',
                'fecha-devolucion' => 'required|date'
                //'fechavuelta' => 'required',//_if:tipo_vuelo,1|nullable',
                //'pasajeros_adultos' => 'required|integer',
                //'pasajeros_ninos' => 'required|integer',
                //'tipo_pasaje' => 'required|integer|between:1,3'
                //'cabina' => 'required',
            ]);
        //dd($params);
        request()->session()->put('busqueda.vehicles', $params);
        // //dd($params);
        //$pasajeros = request('pasajeros');
        $vehicles = Vehicle::buscarVehiculos($params);
        //dd($vehicles);

        // // $vehicles = Vehicle::where('zone_id', request('zone'))
        // //             ->where('n_pasajeros', '>=', (int)$pasajeros)
        // //             ->get();
         if(count($vehicles)>0)
        {
            return view('modules.vehicleReservation.vehicle.index', compact('vehicles'));
        }
        else{
            return view('modules.vehicleReservation.vehicle.noDisp');
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
        $vehicle = Vehicle::create($request->all());

        /* Guardar en el historial */
        $user_id = Crypt::decrypt($request->actual_user_id); 
        $actual_user = User::findOrFail($user_id);
        History::create([
            'user_id' => $actual_user->id,
            'action' => 'El usuario '.$actual_user->name.' ha agregado el vehículo ID: '.$vehicle->id.' Patente: '.$vehicle->patente,
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Vehicle::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::find($id);
        $outcome = $vehicle->fill($this->validate($request, [
            'zone_id' => 'required',
            'vehicle_provider_id' => 'required',
            'patente' => 'required',
            'marca' => 'required',
            'tipo' => 'required',
            'gamma' => 'required',
            'transmision' => 'required',
            'combustible' => 'required',
            'n_pasajeros' => 'required',
            'equipaje_g' => 'required',
            'equipaje_p' => 'required',
            'n_puertas' => 'required',
            'n_kilometraje' => 'required',
            'precio' => 'required',
            'aire_acondicionado' => 'required',
        ]))->save();

        /* Guardar en el historial */
        $user_id = Crypt::decrypt($request->actual_user_id); 
        $actual_user = User::findOrFail($user_id);
        History::create([
            'user_id' => $actual_user->id,
            'action' => 'El usuario '.$actual_user->name.' ha actualizado el vehículo ID: '.$id,
        ]);

        if ($outcome) {
            return back()->with('success_message','Actualizado con éxito!');
        } else {
            return back()->with('success_message','Ha ocurrido un error en la Base de Datos al actualizar!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $vehicle = Vehicle::find($id);

        /* Guardar en el historial */
        $user_id = Crypt::decrypt($request->actual_user_id); 
        $actual_user = User::findOrFail($user_id);
        History::create([
            'user_id' => $actual_user->id,
            'action' => 'El usuario '.$actual_user->name.' ha eliminado el vehículo ID: '.$id.'Patente: '.$vehicle->patente,
        ]);

        $vehicle->delete();

        

        return back();
    }
}
