<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory; // Enables factory support for creating instances in tests and seeding

    /**
     * Defines the relationship between Book and Review.
     *
     * A book can have many reviews, creating a one-to-many relationship
     * where each book is associated with multiple reviews.
     */
    public function reviews() {
        return $this->hasMany(Review::class);
    }
}
