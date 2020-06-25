<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Paciente extends User
{
    public function user() {
        return $this->belongsTo(User::class);      
    }
    
    protected $fillable = [
        'observaciones',
        'fecha_ingreso',
        'id_user',

    ];
  

   
}
