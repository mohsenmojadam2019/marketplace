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
            $table->id();
            $table->string('title');
            $table->decimal('price', 10, 2);
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->string('shipping_address');
            $table->string('delivery_option')->after('user_id')->nullable();
            $table->decimal('total_price', 8, 2)->after('delivery_option')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->index('title');
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
