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
        Schema::create('feeinvoices', function (Blueprint $table) {
            $table->id();
            $table->string('feeinvoice_no')->nullable();
            $table->string('student_id')->nullable();
            // $table->string('class_id')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('payable')->nullable();
            $table->string('paid')->default(0);
            $table->string('invoice_date')->nullable();
            // will update two times, one during generation and one during payment 
            $table->string('due_date')->nullable();
            // status => {0 = unpaid, 1 = partially paid, 2 = paid}
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
        Schema::dropIfExists('feeinvoices');
    }
};
