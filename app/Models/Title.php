<?php

namespace App\Models;

use App\QueryBuilders\TitleBuilder;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\DeletedModels\Models\Concerns\KeepsDeletedModels;

class Title extends Model
{
    use HasUuids, HasFactory, SoftDeletes, Sluggable;

    protected $fillable = [
        'isbn',
        'title',
        'description',
        'publication_year',
        'publisher'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'title_genre');
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'title_author');
    }


    public function newEloquentBuilder($query): TitleBuilder
    {
        return new TitleBuilder($query);
    }
}
