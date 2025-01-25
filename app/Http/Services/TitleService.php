<?php

namespace App\Http\Services;

use App\Models\Author;
use App\Models\Title;

class TitleService
{
    public function createTitleWithAuthor(array $data)
    {
        $title = Title::create($data);

        if (array_key_exists('author_ids', $data) && $authors = Author::find($data['author_ids'])) {
            $title->authors()->sync($authors);
        }

        return $title;
    }

    public function updateTitleWithAuthor(Title $title, array $data)
    {
        $title->update($data);

        if (array_key_exists('author_ids', $data)) {
            if (empty($data['author_ids'])) {
                $title->authors()->detach();
            } else {
                $title->authors()->sync($data['author_ids']);
            }
        }

        return $title;
    }
}

