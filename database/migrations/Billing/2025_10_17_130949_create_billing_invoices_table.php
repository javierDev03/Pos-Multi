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
        Schema::create('billing_invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sale_id')->references('id')->on('sales_sales')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('client_id')->references('id')->on('sales_clients')->onDelete('cascade')->onUpdate('cascade');
            $table->string('xml_url');
            $table->string('pdf_url');
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billing_invoices');
    }
};
