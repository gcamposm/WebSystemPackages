<?php

namespace App\Http\Controllers\OthersControllers;

use App\Modules\Others\Package;
use App\Modules\HousingReservation\Hotel;
use App\Modules\HousingReservation\HotelRoom;
use App\Modules\FlightReservation\FlightDetail;
use App\Modules\FlightReservation\RoundtripFlight;
use App\Modules\VehicleReservation\Vehicle;
use App\Modules\VehicleReservation\Zone;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $hotels = Hotel::all()->where('pais', request('zona_id'));
        // $packages = Package::all()->where('pais', request('zona_id'));
        
        // if(count($packages)>0)
        // {
        //     return view('modules.others.package.index', compact('packages'));
        // }
        // else{
        //     return view('modules.others.package.noDisp');
        // }
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
        Package::create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $package = Package::find($id);
        $outcome = $package->fill($this->validate($request, [
            'hotel_id' => 'required',
            'vehicle_id' => 'required',
            'type' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
        ]))->save();

        if ($outcome) {
            return back()->with('success_message','Actualizado con éxito!');
        } else {
            return back()->with('success_message','Ha ocurrido un error en la Base de Datos al actualizar!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        //
    }

    public function va()
    {
        //dd(":D");
        $params = $this->validate(request(), [
                'origen-packageOne' => 'required|integer',
                'destino-packageOne' => 'required|integer',
                'fecha-ida-packageOne' => 'required|date',
                'fecha-vuelta-packageOne' => 'required|date',
                'pasajeros' => 'required|integer',
                'cabina' => 'required|integer|between:1,3',
            ]);
        request()->session()->put('busqueda.packageva', $params);
        $parametrosVuelo = [
            'origen' => $params['origen-packageOne'],
            'destino' => $params['destino-packageOne'],
            'fechaida2' => $params['fecha-ida-packageOne'],
            'fechavuelta' => $params['fecha-vuelta-packageOne'],
            'pasajeros' => $params['pasajeros'],
            'cabina' => $params['cabina'],
        ];
        $packages = [];
        $hotels = Hotel::where('ciudad_id','=', $params['destino-packageOne'])->get();
        //dump($hotels);
        $roundtrips = RoundtripFlight::buscarVuelosIdaVuelta($parametrosVuelo);
        $habitaciones = [];
        //dd($roundtrips);
        foreach($roundtrips as $roundtrip)
        {
            //$fechaEntrada1 = 
            $fechaEntrada1 = $roundtrip->vueloIda->fecha_aterrizaje;
            //dump($fechaEntrada1);
            $fechaEntrada2 = Carbon::createFromFormat('Y-m-d H:i:s', $fechaEntrada1)->format('Y-m-d');
            
            //dump($fechaEntrada2);
            $parametrosHabitacion = [
                'fecha-entrada-housing' => $fechaEntrada2,
                'fecha-salida-housing' => $params['fecha-vuelta-packageOne'],
                'personas' => $params['pasajeros'],
                //anañadir por persona
            ];
            foreach($hotels as $hotel)
            {
                $rooms = HotelRoom::buscarHabitacion($parametrosHabitacion, $hotel->id);
                foreach($rooms as $room)
                {
                    $habitaciones[] = $room;
                    $packages[] = Package::create([
                                    'roundtrip_id' => $roundtrip->id,
                                    'hotel_room_id'=> $room->id,
                                    'vehicle_id' => null,
                                    'type' => 1,
                                    'fecha_inicio' => $params['fecha-ida-packageOne'],
                                    'fecha_fin' => $params['fecha-vuelta-packageOne'],
                                    'precio' => (int)(($room->precio + $roundtrip->precio_economy) * 0.8),

                                 ]);
                }
            }
        }
        if(count($packages) > 9)
        {
            $packages = array_slice($packages, 0, 9);
            //$packages = $packages->inRandomOrder()->take(9)->get();
        }
        if(count($packages)>0)
        {
            return view('modules.others.package.indexva', compact('packages'));
        }
        else{
            return view('modules.others.package.noDisp');
        }
    }

    public function vv()
    {
        $params = $this->validate(request(), [
            'origen' => 'required|integer',
            'destino' => 'required|integer',
            'fecha-ida-packageTwo' => 'required|date',
            'fecha-vuelta-packageTwo' => 'required|date',
            'pasajeros' => 'required|integer',
            'cabina' => 'required|integer|between:1,3',
        ]);
        request()->session()->put('busqueda.packagevv', $params);
        $parametrosVuelo = [
            'origen' => $params['origen'],
            'destino' => $params['destino'],
            'fechaida2' => $params['fecha-ida-packageTwo'],
            'fechavuelta' => $params['fecha-vuelta-packageTwo'],
            'pasajeros' => $params['pasajeros'],
            'cabina' => $params['cabina'],
        ];

        $packages = [];

        $roundtrips = RoundtripFlight::buscarVuelosIdaVuelta($parametrosVuelo);
        //dump($roundtrips);
        foreach($roundtrips as $roundtrip)
        {
            $fechaEntrada1 = $roundtrip->vueloIda->fecha_aterrizaje;
            $fechaEntrada2 = Carbon::createFromFormat('Y-m-d H:i:s', $fechaEntrada1)->format('Y-m-d');

            $parametrosVehiculo = [
                'zone' => $params['destino'],
                'fecha-recogida' => $fechaEntrada2,
                'fecha-devolucion' => $params['fecha-vuelta-packageTwo'],
                'pasajeros' => $params['pasajeros']
            ];
            $vehiculos = Vehicle::buscarVehiculos($parametrosVehiculo);
            foreach ($vehiculos as $vehiculo)
            {
                $packages[] = Package::create([
                    'roundtrip_id' => $roundtrip->id,
                    'hotel_room_id'=> null,
                    'vehicle_id' => $vehiculo->id,
                    'type' => 2,
                    'fecha_inicio' => $params['fecha-ida-packageTwo'],
                    'fecha_fin' => $params['fecha-vuelta-packageTwo'],
                    'precio' => (int)(($vehiculo->precio + $roundtrip->precio_economy) * 0.8),

                ]);
            }

        }
        if(count($packages) > 9)
        {
            $packages = array_slice($packages, 0, 9);
        }
        if(count($packages)>0)
        {
            return view('modules.others.package.indexvv', compact('packages'));
        }
        else{
            return view('modules.others.package.noDisp');
        }
    }

    public function vav()
    {
        $params = $this->validate(request(), [
            'origen' => 'required|integer',
            'destino' => 'required|integer',
            'fecha-ida-packageThree' => 'required|date',
            'fecha-vuelta-packageThree' => 'required|date',
            'pasajeros' => 'required|integer',
            'cabina' => 'required|integer|between:1,3',
        ]);
        request()->session()->put('busqueda.packagevav', $params);
        $parametrosVuelo = [
            'origen' => $params['origen'],
            'destino' => $params['destino'],
            'fechaida2' => $params['fecha-ida-packageThree'],
            'fechavuelta' => $params['fecha-vuelta-packageThree'],
            'pasajeros' => $params['pasajeros'],
            'cabina' => $params['cabina'],
        ];

        $packages = [];
        $hotels = Hotel::where('ciudad_id','=', $params['destino'])->get();
        //dump($hotels);
        $roundtrips = RoundtripFlight::buscarVuelosIdaVuelta($parametrosVuelo);
        $habitaciones = [];
        //dd($roundtrips);
        foreach($roundtrips as $roundtrip)
        {
            //$fechaEntrada1 =
            $fechaEntrada1 = $roundtrip->vueloIda->fecha_aterrizaje;
            //dump($fechaEntrada1);
            $fechaEntrada2 = Carbon::createFromFormat('Y-m-d H:i:s', $fechaEntrada1)->format('Y-m-d');
            $parametrosVehiculo = [
                'zone' => $params['destino'],
                'fecha-recogida' => $fechaEntrada2,
                'fecha-devolucion' => $params['fecha-vuelta-packageThree'],
                'pasajeros' => $params['pasajeros']
            ];
            $vehiculos = Vehicle::buscarVehiculos($parametrosVehiculo);
            //dump($fechaEntrada2);
            $parametrosHabitacion = [
                'fecha-entrada-housing' => $fechaEntrada2,
                'fecha-salida-housing' => $params['fecha-vuelta-packageThree'],
                'personas' => $params['pasajeros'],
                //anañadir por persona
            ];
            foreach($hotels as $hotel)
            {
                $rooms = HotelRoom::buscarHabitacion($parametrosHabitacion, $hotel->id);
                foreach($rooms as $room)
                {
                    $habitaciones[] = $room;
                    $indice = rand(0,count($vehiculos));
                    $packages[] = Package::create([
                        'roundtrip_id' => $roundtrip->id,
                        'hotel_room_id'=> $room->id,
                        'vehicle_id' => $vehiculos[0]->id,
                        'type' => 3,
                        'fecha_inicio' => $params['fecha-ida-packageThree'],
                        'fecha_fin' => $params['fecha-vuelta-packageThree'],
                        'precio' => (int)(($room->precio + $roundtrip->precio_economy) * 0.8),

                    ]);
                }
            }
        }
        if(count($packages) > 9)
        {
            $packages = array_slice($packages, 0, 9);
            //$packages = $packages->inRandomOrder()->take(9)->get();
        }
        if(count($packages)>0)
        {
            return view('modules.others.package.indexvav', compact('packages'));
        }
        else{
            return view('modules.others.package.noDisp');
        }
    }
}
