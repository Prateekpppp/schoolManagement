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
        // student_fees = invoice
        // this table of to asign fee type on a student
        Schema::create('student_fees', function (Blueprint $table) {
            $table->id();
            $table->string('student_id');
            $table->string('fee_id');
            $table->string('paid')->default('0');
            $table->string('fee')->default('0');
            // status => 0 = failed, 1 = processing, 2 = successful
            $table->tinyInteger('status')->default(1);
            $table->json('additional_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_fees');
    }
};
