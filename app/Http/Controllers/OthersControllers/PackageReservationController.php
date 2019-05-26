<?php

namespace App\Http\Controllers\OthersControllers;

use App\Modules\Others\PackageReservation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PackageReservationController extends Controller
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
     * @param  \App\packageReservation  $packageReservation
     * @return \Illuminate\Http\Response
     */
    public function show(packageReservation $packageReservation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\packageReservation  $packageReservation
     * @return \Illuminate\Http\Response
     */
    public function edit(packageReservation $packageReservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\packageReservation  $packageReservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, packageReservation $packageReservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\packageReservation  $packageReservation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $packageReservation = PackageReservation::find($id);
        $packageReservation->delete();
        return back();
    }
}
