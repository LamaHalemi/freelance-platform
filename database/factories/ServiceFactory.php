<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'category_id' => \App\Models\Category::factory(),
            'title' => fake()->sentence(4),
            'description' => fake()->paragraph(),
            'budget' => fake()->randomFloat(2, 50, 1000),
            'deadline' => fake()->dateTimeBetween('+1 week', '+1 month'),
            'status' => 'open',
        ];
    }
}
