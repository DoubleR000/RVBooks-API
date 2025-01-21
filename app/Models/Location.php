<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\DeletedModels\Models\Concerns\KeepsDeletedModels;

class Location extends Model
{
    use KeepsDeletedModels;

    protected $fillable = [
        'name',
        'description',
        'parent_id'
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function children()
    {
        return $this->hasMany(Location::class, 'parent_id');
    }
    public function parent()
    {
        return $this->belongsTo(Location::class, 'parent_id');
    }
}
