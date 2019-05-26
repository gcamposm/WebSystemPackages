<?php

namespace App\Modules\Others;
use App\Modules\FlightReservation\FlightDetail;
use App\Modules\VehicleReservation\VehicleReservation;
use App\Modules\FlightReservation\FlightReservation;
use App\Modules\HousingReservation\HotelReservation;
use App\Modules\FlightReservation\FlightSellDetail;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Sell extends Model
{
    protected $table = 'sells';

    protected $fillable = [
        'source',
        'user_id',
        'monto_total',
        'fecha',
        'impuesto',
        'tipo_comprobante',
        'metodo_pago',
        'n_cuotas',
        'descuento',
        'user_email',
        'user_name',
        'pasarela_pago',
        'error',
    ];

     /* Relaciones */

    public function user()
    {
      return $this->belongsTo(User::class);
    }
    public function flightDetail(){
      return $this->belongsToMany(FlightDetail::class)->withPivot('cantidad');
    }
    public function vehicleReservation()
    {
      return $this->hasMany(VehicleReservation::class);
    }

    public function flightSellDetail(){
    	return $this->hasMany(FlightSellDetail::class);
    }

    public function flightReservation(){
    	return $this->hasMany(FlightReservation::class);
    }

    public function hotelReservation(){
    	return $this->hasMany(HotelReservation::class);
    }

    public function insuranceReservation(){
    	return $this->hasMany(InsuranceReservation::class);
    }

    public function packageReservation(){
    	return $this->hasMany(PackageReservation::class);
    }
}
