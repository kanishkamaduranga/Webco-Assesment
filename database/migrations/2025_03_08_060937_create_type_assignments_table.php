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
        Schema::create('type_assignments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_assignment_id'); // FK to products or categories
            $table->string('type_assignments_type'); // 'product' or 'category'
            $table->string('my_bonus_field');
            $table->unsignedBigInteger('type_id'); // FK to product_types
            $table->timestamps();


            $table->index(['type_assignment_id', 'type_assignments_type']);
            $table->foreign('type_id')->references('id')->on('product_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_assignments');
    }
};
