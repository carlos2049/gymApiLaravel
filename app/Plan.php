<?php

namespace App;
use App\SubPlan;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    public function subPlan()
    {
        return $this->hasMany(SubPlan::class);
    }
    protected $table = 'planes';
    protected $fillable = [
        'nombre'
    ];
}
