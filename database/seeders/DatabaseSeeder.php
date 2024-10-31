<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Review;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 33 Book instances using the Book factory
        Book::factory(33)->create()->each(function ($book) {

            // Generate a random number of reviews between 5 and 30 for each book
            $numReviews = random_int(5, 30);

            // Create the generated number of Review instances
            Review::factory()->count($numReviews)
                ->good()          // Apply a "good" state to each review (assuming 'good' is a defined state in the factory)
                ->for($book)      // Associate each review with the current book
                ->create();       // Persist the reviews in the database
        });
        // Create 33 Book instances using the Book factory
        Book::factory(33)->create()->each(function ($book) {

            // Generate a random number of reviews between 5 and 30 for each book
            $numReviews = random_int(5, 30);

            // Create the generated number of Review instances
            Review::factory()->count($numReviews)
                ->average()          // Apply a "good" state to each review (assuming 'average' is a defined state in the factory)
                ->for($book)      // Associate each review with the current book
                ->create();       // Persist the reviews in the database
        });
        // Create 33 Book instances using the Book factory
        Book::factory(34)->create()->each(function ($book) {

            // Generate a random number of reviews between 5 and 30 for each book
            $numReviews = random_int(5, 30);

            // Create the generated number of Review instances
            Review::factory()->count($numReviews)
                ->bad()          // Apply a "good" state to each review (assuming 'bad' is a defined state in the factory)
                ->for($book)      // Associate each review with the current book
                ->create();       // Persist the reviews in the database
        });
    }
}
