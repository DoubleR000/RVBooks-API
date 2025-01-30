<?php

namespace App\Models;

use App\QueryBuilders\BookBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title_id',
        'location_id',
        'book_status_id',
        'book_condition_id',
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
        return $this->belongsTo(BookCondition::class, 'book_condition_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(BookStatus::class, 'book_status_id', 'id');
    }

    public function newEloquentBuilder($query)
    {
        return new BookBuilder($query);
    }
}
