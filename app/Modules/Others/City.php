<?php

namespace App\Modules\Others;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    protected $fillable = [
        'pais_id',
        'nombre',
    ];

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
