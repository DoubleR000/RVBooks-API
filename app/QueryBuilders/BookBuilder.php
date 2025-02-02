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

    public function search(string $text)
    {
        return $this->whereHas('title', function ($query) use ($text) {
            $query->whereFullText('title', sprintf("\"%s\"", $text));
        });
    }
}
