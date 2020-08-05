<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Quotation;
use App\Diagnostic;

class Customer extends Model
{
    public function quotations()
    {
        return $this->hasOne(Quotation::class);
    }
    public function diagnostic()
    {
        return $this->hasOne(Diagnostic::class);
    }
}
