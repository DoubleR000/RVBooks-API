<?php

namespace Database\Factories;

use App\Models\RentalPeriodUnit;
use App\Models\Title;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LoanPrice>
 */
class LoanPriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'rental_period_unit_id' => RentalPeriodUnit::inRandomOrder()->first()->id,
            'rental_period_amount' => fake()->randomNumber(2),
            'price' => fake()->randomFloat(2, max: 100),
            'effective_from' => fake()->dateTimeThisYear()
        ];
    }
}
