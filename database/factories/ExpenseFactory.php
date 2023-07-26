<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'emp_id' => fake()->numberBetween(1,10),
            'date' => fake()->dateTime(),
            'name' => fake()->words(4, true),
            'description' =>  fake()->words(10, true),
            'amount' =>fake()->numberBetween(3000,10000),
        ];
    }
}
