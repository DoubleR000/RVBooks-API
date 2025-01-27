<?php

namespace App\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class TitleBuilder extends Builder
{
    public function filterByGenre(string $genre)
    {
        return $this->whereHas('genres', function ($q) use ($genre) {
            $q->where('name', $genre);
        });
    }

    public function filterByAuthor(string $author)
    {
        return $this->whereHas('authors', function ($q) use ($author) {
            $q->where('name', $author);
        });
    }

    public function filterByYear(int $year)
    {
        return $this->where('publication_year', $year);
    }
}
