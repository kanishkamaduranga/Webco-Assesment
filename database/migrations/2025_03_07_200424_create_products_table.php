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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->decimal('price', 10, 2);
            $table->text('description')->nullable();
            $table->boolean('status')->default(true);
            $table->foreignId('product_category_id')->constrained('product_categories')->onDelete('cascade'); // FK to product_categories
            $table->foreignId('product_color_id')->constrained('product_colors')->onDelete('cascade'); // FK to product_colors

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
