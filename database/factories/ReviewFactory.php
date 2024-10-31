<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Default attributes for a Review instance
        return [
            'book_id' => null, // Placeholder for associating a review with a specific book
            'review' => fake()->paragraph, // Generates a random paragraph for the review text
            'rating' => fake()->numberBetween(1, 5), // Random rating between 1 and 5
            'created_at' => fake()->dateTimeBetween('-2 years'), // Random creation date within the last 2 years
            'updated_at' => function (array $attributes) {
                // Set the starting date to the 'created_at' attribute value
                $startDate = $attributes['created_at'];

                // Set the ending date to the current time, adjusted back by 1 hour
                // This avoids generating times in the invalid range caused by daylight saving time changes
                $endDate = now()->modify('-1 hour');

                // Generate a random datetime between the adjusted range of 'created_at' and 'now - 1 hour'
                return fake()->dateTimeBetween($startDate, $endDate);
            },
        ];
    }

    // Define a "good" state with a high rating (4-5)
    public function good() {
        return $this->state(function(array $attributes) {
            return [
                'rating' => fake()->numberBetween(4, 5)
            ];
        });
    }

    // Define an "average" state with a medium to high rating (2-5)
    public function average() {
        return $this->state(function(array $attributes) {
            return [
                'rating' => fake()->numberBetween(2, 5)
            ];
        });
    }

    // Define a "bad" state with a low to medium rating (1-3)
    public function bad() {
        return $this->state(function(array $attributes) {
            return [
                'rating' => fake()->numberBetween(1, 3)
            ];
        });
    }
}
