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
        Schema::create('sales_sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->references('id')->on('sales_clients')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id')->references('id')->on('core_users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('branch_id')->references('id')->on('core_branches')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('total', 20, 6);
            $table->string('payment_method');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales_sales');
    }
};
