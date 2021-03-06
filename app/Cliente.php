<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Cliente extends User
{
    
    public function user() {
        return $this->belongsTo(User::class);      
    }
    
    protected $fillable = [
        'actividad_fisica',
        'objetivo',
        'enfermedades',
        'alergias',
        'contacto_emergencia',
        'fono_contacto_eme',
        'fecha_ingreso',
        'observaciones',
        'id_subplan',
        'id_user',

    ];
}
