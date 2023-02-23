<?php

namespace Database\Factories;

use Faker\Generator;
use Illuminate\Container\Container;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->date,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
            'amount' => $this->faker->randomDigit(),
            'address' => $this->faker->address(),
        ];
    }
}
