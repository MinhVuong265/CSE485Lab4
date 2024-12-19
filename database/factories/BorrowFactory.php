<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;
use App\Models\Reader;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Borrow>
 */
class BorrowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reader_id' => Reader::factory(),
            'book_id' => Book::factory(),
            'borrow_date' => fake()->dateTimeBetween('-1 year', 'now'),
            'return_date' => fake()->dateTimeBetween('now', '+1 year'),
            'status' => fake()->boolean(30)
        ];
    }
}
