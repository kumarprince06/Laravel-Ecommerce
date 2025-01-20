<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Primary key, auto-incrementing
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to the users table (assuming you have a users table)
            $table->decimal('total', 10, 2); // Total price of the order
            $table->enum('status', ['pending', 'processing', 'completed', 'cancelled']); // Order status
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
