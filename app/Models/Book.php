<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title_id',
        'location_id',
        'status_id',
        'condition_id',
        'acquisition_date'
    ];

    public function title()
    {
        return $this->belongsTo(Title::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function condition()
    {
        return $this->belongsTo(BookCondition::class);
    }

    public function status()
    {
        return $this->belongsTo(BookStatus::class);
    }
}
