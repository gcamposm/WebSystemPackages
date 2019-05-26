<?php

namespace App\Http\Controllers\FlightReservationControllers;

use App\Modules\FlightReservation\FlightDetail;
use App\Modules\FlightReservation\Airport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FlightDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(request()->session());

        /*$origin = Airport::where('id',request('origen_id'))->pluck('id');
        $destiny = Airport::where('id',request('destino_id'))->pluck('id');
        $flightDetails =  FlightDetail::where('id_origen', $origin)
                                            ->where('id_destino', $destiny)
                                            ->get();*/
        $flight = FlightDetail::all();
        $var =[
            'costo' => 0,
            'capacidad'=> 1,
            'costo_persona' => 2];
        request()->session()->put('busqueda.vuelo', $var);

        // dd(request()->session()->get('busqueda.vuelo.capacidad'));
        // request()->session()->put('busqueda.vuelo', $flight);
        // $test = request()->session()->get('buesqueda.vuelo');
        // foreach($test as $t){
           
        // }

        // $algo = "este es un mensaje";
        // request()->session()->put('busqueda', $algo);
        // $test = request()->session()->get('buesqueda');
        // dd($test);
         if(count($flight)>0)
        {
            return view('modules.flightReservation.flightdetail.flightDetail', compact('flight'));
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
        return FlightDetail::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FlightDetail  $flightDetail
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return FlightDetail::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FlightDetail  $flightDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(FlightDetail $flightDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FlightDetail  $flightDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $flightDetail = FlightDetail::find($id);
        $flightDetail->fill($this->validate($request, [
            'avion_id' => 'required',
            'vuelo_id' => 'required',
            'fecha_despegue' => 'required',
            'fecha_aterrizaje' => 'required',
          ]))->save();

        return "se ha actualizado";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FlightDetail  $flightDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flightDetail = FlightDetail::findOrFail($id);
        $flightDetail->delete();
        return "eliminado";
    }

    // public function origen($id)
    // {

    //     $det_vuelos = DetalleVuelo::where('id_origen','=',$id)->get();
    //     $asientos = $det_vuelos[0]->asiento()->get();
    //     return $det_vuelos;
    //     $det_vuelos = DB::table('detalles_vuelos')
    //     ->where('id_destino', '=', $id)
    //     ->join('aeropuertos','aeropuertos.id','=','detalles_vuelos.id_destino')
    //     ->join('aviones','aviones.id','=','detalles_vuelos.id_avion')
    //     ->join('companias','companias.id','=','aviones.compania_id')
    //     ->select('aeropuertos.nombre as Destino','companias.nombre as Aerolinea', 'aviones.modelo as Avion')
    //     ->get();
    //     return $det_vuelos;
    // }
    // public function destino($id)
    // {
    //     $det_vuelos = DetalleVuelo::where('id_destino','=',$id)->get();
    //     return $det_vuelos;
    // }
    // public function origenDestino($id1,$id2)
    // {
    //     $det_vuelos = DetalleVuelo::where(
    //         ['id_origen', '=', $id1],
    //         ['id_destino', '=', $id2])->get();
    //     return $det_vuelos;
    // }
}
