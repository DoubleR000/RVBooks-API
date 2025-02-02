<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentalPeriodUnit extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'period'
    ];

    public function loanPrices()
    {
        return $this->hasMany(LoanPrice::class);
    }
}
