<?php

namespace App\Modules\Others;

use Illuminate\Database\Eloquent\Model;
use App\Modules\HousingReservation\Hotel;
use App\Modules\HousingReservation\HotelRoom;
use App\Modules\VehicleReservation\Vehicle;
use App\Modules\FlightReservation\RoundtripFlight;
use App\Modules\Others\PackageReservation;
use Carbon\Carbon;

class Package extends Model
{
    protected $table = 'packages';
    
    protected $fillable = [
        'roundtrip_id',
        'hotel_room_id',
        'vehicle_id',
        'type',
        'fecha_inicio',
        'fecha_fin',
        'precio'
    ];

    public function flight(){
    	return $this->belongsTo(RoundtripFlight::class, 'roundtrip_id');
    }

    public function hotelroom(){
    	return $this->belongsTo(HotelRoom::class,'hotel_room_id');
    }

    public function hotel(){
    	return $this->belongsTo(Hotel::class,'hotel_id');
    }

    public function vehicle(){
    	return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

    public function packageReservation(){
    	return $this->hasMany(PackageReservation::class);
    }
    public function getDias()
    {
        
        $fechaPartida = Carbon::parse($this->fecha_inicio);
        $fechaLlegada = Carbon::parse($this->fecha_fin);
        return $fechaPartida->diff($fechaLlegada)->format('%a días');
        
    }
    public static function buscarPaquetesVA($params)
    {
        
    }
    public static function buscarPaquetesVV($params)
    {
        
    }
    public static function buscarPaquetesVAV($params)
    {
        
    }
    
}
