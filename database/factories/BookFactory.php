<?php

namespace Database\Factories;

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
        'name' => fake()->sentence(),  
        'author' => fake()->name(), 
        'category' => fake()->word(), 
        'year' => fake()->year(), 
        'quantity' => fake()->numberBetween(1, 100),
    ];
}

}
