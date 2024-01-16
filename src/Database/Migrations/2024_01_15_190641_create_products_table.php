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
            $table->string('title');
            $table->decimal('price', 10, 2);
            $table->text('description');
            $table->integer('quantity');
            $table->boolean('is_available');
            $table->string('manufacturer');
            $table->decimal('weight', 5, 2);
            $table->decimal('shipping_cost', 8, 2)->nullable();
            $table->string('dimensions');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->index('title');
            $table->index('manufacturer');
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
