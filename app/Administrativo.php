<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Administrativo extends User
{
    public function user() {
        return $this->belongsTo(User::class);      
    }


    protected $fillable = [
    
        'id_user',

    ];
}
