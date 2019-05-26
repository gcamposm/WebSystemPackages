<?php

namespace App\Http\Controllers\OthersControllers;

use App\Modules\Others\Insurance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexo()
    {
        $insurances = Insurance::where('groupsize', request('tipo'))
                            ->where('zone_id', request('zone_id'))                    
                            ->get();
        if(count($insurances)>0)
        {
            return view('modules.others.insurance.index', compact('insurances'));
        }
        else{
            return view('modules.others.insurance.noDisp');
        }
    }

    public function indext()
    {
        // Para futuros filtros
        $insurances = Insurance::all();         
        return view('modules.others.insurance.index', compact('insurances'));
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
        Insurance::create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Insurance  $insurance
     * @return \Illuminate\Http\Response
     */
    public function show(Insurance $insurance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Insurance  $insurance
     * @return \Illuminate\Http\Response
     */
    public function edit(Insurance $insurance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Insurance  $insurance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $insurance = Insurance::find($id);
        $outcome = $insurance->fill($this->validate($request, [
            'zone_id' => 'required',
            'medicalService' => 'required',
            'service2' => 'required',
            'service3' => 'required',
            'groupsize' => 'required',
            'price' => 'required',
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
     * @param  \App\Insurance  $insurance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $insurance = Insurance::find($id);
        $insurance->delete();
        return back();
    }
}
