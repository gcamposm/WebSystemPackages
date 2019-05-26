<?php

namespace App\Http\Controllers\HousingReservationControllers;

use App\Modules\HousingReservation\HousingAndService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HousingAndServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return HousingAndService::all();
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
        return HousingAndService::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HousingAndService  $housingAndService
     * @return \Illuminate\Http\Response
     */
    public function show(HousingAndService $housingAndService)
    {
         return HousingAndService::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HousingAndService  $housingAndService
     * @return \Illuminate\Http\Response
     */
    public function edit(HousingAndService $housingAndService)
    {
        if ($housingAndService->exists()) {
            return view('modules.housingReservation.housingAndService.edit', compact('housingAndService'));
        } else {
            $response = ['error' => 'No es posible editar una id que no existe'];
            return redirect('/housingAndServices')->with($response);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HousingAndService  $housingAndService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $housingAndService = HousingAndService::find($id);
        $housingAndService->fill($this->validate($request, [
            'servicio_alojamiento_id' => 'required',
            'alojamiento_privado_id' => 'required',
        ]))->save();
        
        return 'Actualizado con éxito!';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HousingAndService  $housingAndService
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $housingAndService = HousingAndService::findOrFail($id);
        $housingAndService->delete();
        return "eliminado";
    }
}
