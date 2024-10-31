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
        // Create the 'books' table with specified columns
        Schema::create('books', function (Blueprint $table) {
            $table->id(); // Adds an auto-incrementing 'id' column as the primary key

            $table->string('title'); // Adds a 'title' column to store the book title as a string
            $table->string('author'); // Adds an 'author' column to store the author's name as a string

            $table->timestamps(); // Adds 'created_at' and 'updated_at' columns to track record creation and update times
        });
    }

    /**
     * Reverse the migrations.
     * This method is called when the migration is rolled back.
     */
    public function down(): void
    {
        // Drops the 'books' table if it exists
        Schema::dropIfExists('books');
    }
};
