<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory; // Enables factory support for creating instances in tests and seeding

    /**
     * Defines the relationship between Review and Book.
     *
     * A review belongs to a single book, creating a one-to-many relationship
     * where each review is associated with one book.
     */
    public function book() {
        return $this->belongsTo(Book::class);
    }
}
