<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TitleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'isbn' => $this->isbn,
            'slug' => $this->slug,
            'title' => $this->description,
            'authors' => $this->whenLoaded(
                'authors',
                AuthorResource::collection($this->authors)
            ),
            'publisher' => $this->publisher,
            'publication_year' => $this->publication_year
        ];
    }
}
