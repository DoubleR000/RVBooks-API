<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\DeletedModels\Models\Concerns\KeepsDeletedModels;

class LoanPrice extends Model
{
    use SoftDeletes, HasFactory;

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
