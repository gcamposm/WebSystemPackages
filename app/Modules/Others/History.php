<?php

namespace App\Modules\Others;

use Illuminate\Database\Eloquent\Model;
use App\User;

class History extends Model
{
    protected $table = 'histories';

    protected $fillable = [
        'user_id',
        'action',
    ];

    /* Relaciones */

    public function user(){
        return $this->belongsTo(User::class);
    }
}
