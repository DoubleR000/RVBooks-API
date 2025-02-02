<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoanPrice extends Model
{
    protected $fillable = [
        "title_id",
        "rental_period_unit",
        "rental_period_amount",
        "price",
        "effective_from"
    ];

    public function title()
    {
        return $this->belongsTo(Title::class);
    }
}
