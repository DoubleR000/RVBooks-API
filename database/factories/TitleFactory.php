<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Genre;
use App\Models\Title;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Title>
 */
class TitleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'isbn' => fake()->randomElement([
                fake()->isbn10(),
                fake()->isbn13()
            ]),
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'publication_year' => fake()->year(),
            'publisher' => fake()->company(),
        ];
    }

    public function configure()
    {

        return $this->afterCreating(
            function (Title $title) {

                // Authors
                $useExistingAuthors = fake()->boolean();
                $numberOfAuthors = fake()->numberBetween(1, 3);

                if ($useExistingAuthors) {
                    $authors = Author::inRandomOrder()->limit($numberOfAuthors)->get();

                    if ($authors->isEmpty()) {
                        $title->authors()->attach(Author::factory($numberOfAuthors)->create());
                    } else {
                        $title->authors()->attach($authors);
                    }

                } else {
                    $title->authors()->attach(Author::factory($numberOfAuthors)->create());
                }


                //Genres
    
                $numberOfGenres = fake()->numberBetween(1, 2);
                $genres = Genre::inRandomOrder()->limit($numberOfGenres)->get();

                $title->genres()->attach($genres);
            }
        );
    }
}
