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
        Schema::create('inventory_purchase_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_id')->references('id')->on('inventory_purchases')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('product_id')->references('id')->on('inventory_products')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('quantity');
            $table->decimal('price', 20, 6);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_purchase_items');
    }
};
