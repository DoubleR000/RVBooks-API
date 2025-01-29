<?php

namespace App\Services;

use App\Models\Author;
use App\Models\Genre;
use App\Models\Title;

class TitleService
{
    public function createTitle(array $data)
    {
        $title = Title::create($data);

        if (array_key_exists('author_ids', $data)) {
            $authors = Author::find($data['author_ids']);
            $title->authors()->sync($authors);
        }

        if (array_key_exists('genre_ids', $data)) {
            $genres = Genre::find($data['genre_ids']);
            $title->genres()->sync($genres);
        }

        return $title;
    }

    public function updateTitle(Title $title, array $data)
    {
        $title->update($data);

        if (array_key_exists('author_ids', $data)) {
            if (empty($data['author_ids'])) {
                $title->authors()->detach();
            } else {
                $title->authors()->sync($data['author_ids']);
            }
        }

        if (array_key_exists('genre_ids', $data)) {
            if (empty($data['genre_ids'])) {
                $title->genres()->detach();
            } else {
                $title->genres()->sync($data['genre_ids']);
            }
        }

        return $title;
    }

}

