<?php

namespace App\Http\Controllers\OthersControllers;

use App\User;
use App\Modules\Others\Sell;
use App\Modules\VehicleReservation\VehicleReservationDetail;
use App\Modules\VehicleReservation\VehicleReservation;
use App\Modules\VehicleReservation\VehicleProvider;
use App\Modules\VehicleReservation\Vehicle;
use App\Modules\Others\History;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $realId = Crypt::decrypt($id);  
        $user = User::findOrFail($realId);
        $sells = Sell::where('user_id', $realId)->get();
        $histories = History::where('user_id', $realId)->get();
        return view('modules.others.profile.profile', compact('user', 'sells', 'histories'));
    }

    public function showSellDetail($id)
    {
        $sells = Sell::where('id', $id)->get();
        return view('modules.others.profile.selldetail', compact('sells'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $filePath = $request->file('img')->store('/public/profileImgs');
        $path = '../storage/';
        $finalPath = $path . $filePath;
        
        $user = User::find($id);
        if ($user->name != $request->name) {
            /* Guardar en el historial */
            History::create([
                'user_id' => $user->id,
                'action' => 'Has cambiado el nombre de tu tarjeta de '.$user->name.' a '.$request->name,
            ]);
            $user->name = $request->name;
        }
        if ($user->email != $request->email) {
            /* Guardar en el historial */
            History::create([
                'user_id' => $user->id,
                'action' => 'Has cambiado el nombre de tu tarjeta de '.$user->email.' a '.$request->email,
            ]);
            $user->email = $request->email;
        }
        if ($user->email != $request->email) {
            /* Guardar en el historial */
            History::create([
                'user_id' => $user->id,
                'action' => 'Has cambiado el nombre de tu tarjeta de '.$user->email.' a '.$request->email,
            ]);
            $user->email = $request->email;
        }
        $user->imgurl = $finalPath;
        /* Guardar en el historial */
        History::create([
            'user_id' => $user->id,
            'action' => 'Has cambiado tu imagen de perfil',
        ]);

        $user->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
