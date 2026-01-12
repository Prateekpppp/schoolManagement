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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id')->nullable();
            $table->string('receipt_no')->nullable();
            $table->string('title');
            $table->string('student_id');
            $table->string('transaction_amount');
            $table->string('transaction_id')->nullable();
            $table->string('due_amount')->nullable();
            $table->string('due_date')->nullable();
            $table->string('late_fine')->nullable();
            $table->string('total_dues')->nullable();
            $table->string('date');
            $table->string('payment_method')->default('Cash');
            $table->string('session_id')->nullable();
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
        Schema::dropIfExists('transactions');
    }
};
