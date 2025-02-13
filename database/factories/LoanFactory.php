<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Loan>
 */
class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dueDate = fake()->date();
        $returnDate = fake()->dateTimeBetween('-14 days');
        return [
            'book_id' => Book::available()->inRandomOrder()->first(),
            'user_id' => User::inRandomOrder()->first(),
            'return_date' => $returnDate,
            'due_date' => $dueDate,
            'returned_by_staff' => User::role(['librarian', 'admin'])->inRandomOrder()->first()
        ];
    }
}
