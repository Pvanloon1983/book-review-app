<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * This method is called when the migration is applied.
     */
    public function up(): void
    {
        // Create the 'reviews' table with specified columns
        Schema::create('reviews', function (Blueprint $table) {
            $table->id(); // Adds an auto-incrementing 'id' column as the primary key

            // Review content as text, for storing longer review messages
            $table->text('review');

            // Rating as an unsigned tiny integer (0-255) since ratings are small values (e.g., 1-5)
            $table->unsignedTinyInteger('rating');

            $table->timestamps(); // Adds 'created_at' and 'updated_at' columns

            // $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');

           // Foreign key for 'book_id' column referencing 'id' on 'books' table, with cascading delete
           $table->foreignId('book_id')->constrained()->cascadeOnDelete();

           //Cascading delete: Automatically deletes related records in child tables when a parent record is deleted, ensuring no orphaned entries remain. For example, deleting a book will also delete all its reviews.
        });
    }

    /**
     * Reverse the migrations.
     * This method is called when the migration is rolled back.
     */
    public function down(): void
    {
        // Drops the 'reviews' table if it exists
        Schema::dropIfExists('reviews');
    }
};
