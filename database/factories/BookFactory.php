<?php

namespace Database\Factories;

use App\Models\BookCondition;
use App\Models\BookStatus;
use App\Models\Location;
use App\Models\Title;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title_id' => Title::inRandomOrder()->first()->id ?? Title::factory()->create(),
            'location_id' => Location::inRandomOrder()->first()->id,
            'book_status_id' => BookStatus::inRandomOrder()->first()->id,
            'book_condition_id' => BookCondition::inRandomOrder()->first()->id,
            'acquisition_date' => fake()->dateTime(),
        ];
    }
}
