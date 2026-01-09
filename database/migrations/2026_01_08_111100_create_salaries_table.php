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
        Schema::create('salaries', function (Blueprint $table) {
            // crud
            $table->id();
            $table->string('staff_id');
            $table->string('total_present');
            $table->string('total_absent');
            $table->string('monthly_salary')->nullable();
            // salary calculation based on present days
            $table->string('total_salary')->nullable();
            $table->string('salary_date')->nullable();
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
        Schema::dropIfExists('salaries');
    }
};
