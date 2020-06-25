<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubPlan extends Model
{
    public function user() {
        return $this->belongsTo(User::class);      
    }

    protected $fillable = [
        'nombre',
        'valor_mensual',
        'valor_trimestral',
        'valor_semestral',
        'valor_anual',
        'id_planes',

    ];
}
