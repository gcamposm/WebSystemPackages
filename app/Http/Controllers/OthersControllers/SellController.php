<?php

namespace App\Http\Controllers\OthersControllers;

use App\Modules\Others\Sell;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Sell::all();
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
        return Sell::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Sell::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function edit(Sell $sell)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sell = Sell::find($id);
        $sell->fill($this->validate($request, [
            'id_user' => 'required',
            'monto_total' => 'required',
            'fecha' => 'required',
            'impuesto' => 'required',
            'tipo_comprobante' => 'required',
            'metodo_pago' => 'required',
            'n_cuotas' => 'required',
            'descuento' => 'required',
        ]))->save();

        return "Me he acutalizado correctamente! :D!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sell = Sell::find($id);
        $sell->delete();
        return "lo eliminé";
    }
}
