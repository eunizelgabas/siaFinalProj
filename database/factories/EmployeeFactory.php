<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'last_name' => fake()->lastName,
            'first_name' => fake()->firstName,
            'phone_no' => fake()->phoneNumber,
            'department' => fake()->catchPhrase,
            'position' => fake()->jobTitle,
            'email' => fake()->safeEmail()
        ];
    }
}
