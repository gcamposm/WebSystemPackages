<?php

namespace App\Modules\Others;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    protected $fillable = [
        'nombre',
    ];

    /* Relaciones */

    public function cities(){
        return $this->hasMany(City::class);
    }
}
