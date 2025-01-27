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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id(); // Primary key, auto-incrementing
            $table->foreignId('order_id')->constrained()->onDelete('cascade'); // Foreign key to the orders table
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Foreign key to the products table
            $table->integer('quantity'); // Quantity of the product ordered
            $table->decimal('price', 8, 2); // Price of the product at the time of order
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
