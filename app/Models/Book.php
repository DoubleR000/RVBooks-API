<?php

namespace App\Models;

use App\QueryBuilders\BookBuilder;
use Illuminate\Database\Eloquent\Builder;
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

    public static function scopeAvailable(Builder $query)
    {
        return $query->where('book_status_id', 1);
    }

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

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }

    public function newEloquentBuilder($query)
    {
        return new BookBuilder($query);
    }
}
