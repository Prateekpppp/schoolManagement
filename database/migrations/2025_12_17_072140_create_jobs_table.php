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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('salary');
            $table->integer('openings')->nullable();;
            $table->string('education');
            $table->string('experience');
            $table->string('english_level')->nullable();;
            $table->tinyInteger('gender');
            $table->string('work_type')->nullable();
            $table->string('working_hours')->nullable();;
            $table->string('description')->nullable();;
            $table->timestamps();
            $table->json('additional_data')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
