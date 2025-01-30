<?php

namespace App\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class BookBuilder extends Builder
{
    public function filterByGenre(string $genreId)
    {
        return $this->whereHas('title.genres', function ($query) use ($genreId) {
            $query->where('genre_id', $genreId);
        });
    }

    public function filterByAuthor(string $authorId)
    {
        return $this->whereHas('title.authors', function ($query) use ($authorId) {
            $query->where('author_id', $authorId);
        });
    }

    public function searchTitle(string $title)
    {
        return $this->whereHas('title', function ($query) use ($title) {
            $query->whereFullText('title', $title);
        });
    }
}
