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
        // inventory invoice
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            // auto genrerated invoice no = INV-randon 4 digits 
            $table->string('invoice_no');
            $table->string('category_id');
            $table->string('class_id');
            $table->string('student_id');
            $table->string('amount');
            $table->string('discount')->nullable();
            $table->string('total_amount');
            // upi, cash, card, net banking, online
            $table->string('payment_method')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('invoice_date');
            $table->string('admin_username')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->string('session_id')->nullable();
            $table->json('additional_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
