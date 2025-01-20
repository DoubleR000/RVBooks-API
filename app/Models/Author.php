<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\DeletedModels\Models\Concerns\KeepsDeletedModels;

class Author extends Model
{
    use HasFactory, KeepsDeletedModels;

    protected $fillable = [
        "name",
    ];

    public function titles()
    {
        return $this->belongsToMany(Title::class);
    }
}
