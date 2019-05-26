<?php

namespace App\Http\Controllers\HousingReservationControllers;

use App\Modules\HousingReservation\HousingService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HousingServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return HousingService::all();
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
        return HousingService::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HousingService  $housingService
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return HousingService::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HousingService  $housingService
     * @return \Illuminate\Http\Response
     */
    public function edit(HousingService $housingService)
    {
        if ($housingService->exists()) {
            return view('modules.housingReservation.housingService.edit', compact('housingService'));
        } else {
            $response = ['error' => 'No es posible editar una id que no existe'];
            return redirect('/housingServices')->with($response);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HousingService  $housingService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $housingService = HousingService::find($id);
        $housingService->fill($this->validate($request, [
            'hotel_id' => 'required',
            'nombre' => 'required',
            'precio' => 'required',
            'descripcion' => 'required',
        ]))->save();
        
        return 'Actualizado con éxito!';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HousingService  $housingService
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $housingService = HousingService::findOrFail($id);
        $housingService->delete();
        return "eliminado";
    }
}
