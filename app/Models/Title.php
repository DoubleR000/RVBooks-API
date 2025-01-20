<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\DeletedModels\Models\Concerns\KeepsDeletedModels;

class Title extends Model
{
    use HasFactory, KeepsDeletedModels;

    protected $fillable = [
        'isbn',
        'title',
        'description',
        'publication_year',
        'publisher'
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }
}
