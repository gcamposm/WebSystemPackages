<?php

namespace App\Http\Controllers\OthersControllers;

use App\Modules\Others\InsuranceReservation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InsuranceReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InsuranceReservation  $insuranceReservation
     * @return \Illuminate\Http\Response
     */
    public function show(InsuranceReservation $insuranceReservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InsuranceReservation  $insuranceReservation
     * @return \Illuminate\Http\Response
     */
    public function edit(InsuranceReservation $insuranceReservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InsuranceReservation  $insuranceReservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InsuranceReservation $insuranceReservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InsuranceReservation  $insuranceReservation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $insuranceReservation = InsuranceReservation::find($id);
        $insuranceReservation->delete();
        return back();
    }
}
