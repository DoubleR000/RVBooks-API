<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookCondition extends Model
{
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
