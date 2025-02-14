<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loan extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'book_id',
        'user_id',
        'return_date',
        'due_date',
        'returned_by_staff'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function book()
    {
        $this->belongsTo(Book::class);
    }
}
