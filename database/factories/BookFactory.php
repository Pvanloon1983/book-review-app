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
         // Default attributes for a Book instance
         return [
             'title' => fake()->sentence(3), // Generates a random title with 3 words
             'author' => fake()->name, // Generates a random name for the author
            'created_at' => fake()->dateTimeBetween('-2 years', 'now'), // Generates a random datetime between two years ago and the current datetime to ensure it falls within a valid range for 'created_at'.

            'updated_at' => function (array $attributes) {
                // Generates a random datetime for 'updated_at', ensuring it is always after 'created_at'
                // by using the created_at datetime as the minimum bound and 'now' as the maximum bound.
                return fake()->dateTimeBetween($attributes['created_at'], 'now');
            },
         ];
     }
 }
