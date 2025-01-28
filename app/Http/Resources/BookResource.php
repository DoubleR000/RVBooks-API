<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            "id" => $this->id,
            "location" => $this->whenLoaded('location', $this->location->name),
            "condition" => $this->whenLoaded('condition', $this->condition->name),
            "status" => $this->whenLoaded('status', $this->status->name),
            "title_data" => $this->whenLoaded('title', [
                'id' => $this->title->id,
                'isbn' => $this->title->isbn,
                'title' => $this->title->title,
                'slug' => $this->title->slug,
                'author' => $this->title->authors->pluck('name'),
                'genre' => $this->title->genres->pluck('name')
            ]),
        ];
    }
}
