<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\DeletedModels\Models\Concerns\KeepsDeletedModels;

class Genre extends Model
{
    use KeepsDeletedModels;

    protected $fillable = [
        'name'
    ];

    public function titles()
    {
        return $this->belongsToMany(Title::class);
    }
}
