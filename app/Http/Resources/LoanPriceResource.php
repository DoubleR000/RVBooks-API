<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoanPriceResource extends JsonResource
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
            'rental_duration_in_days' => $this->rental_duration_in_days,
            'price' => $this->price,
            'effective_from' => $this->effective_from,
            'title_data' => $this->whenLoaded('title', [
                'id' => $this->title->id,
                'isbn' => $this->title->isbn,
                'title' => $this->title->title,
                'slug' => $this->title->slug,
            ]),
        ];
    }
}
