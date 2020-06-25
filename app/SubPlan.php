<?php

namespace App;
use App\PLan;

use Illuminate\Database\Eloquent\Model;

class SubPlan extends Model
{
    public function Plan() {
        return $this->belongsTo(Plan::class);      
    }

    protected $table = 'sub_planes';

    protected $fillable = [
        'nombre',
        'valor_mensual',
        'valor_trimestral',
        'valor_semestral',
        'valor_anual',
        'id_planes',

    ];
}
