<?php

namespace App;
use App\SubPlan;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    public function paciente()
    {
        return $this->hasMany(SubPlan::class);
    }
    protected $fillable = [
        'nombre'
    ];
}
