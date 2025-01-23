<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\DeletedModels\Models\Concerns\KeepsDeletedModels;

class BookStatus extends Model
{
    use KeepsDeletedModels;

    public $timestamps = false;

    protected $fillable = [
        'name',
        'description'
    ];

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
