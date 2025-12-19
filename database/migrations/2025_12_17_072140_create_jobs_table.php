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
            $tale->string('title');
            $table->string('salary');
            $table->integer('openings');
            $table->string('education');
            $table->string('experience');
            $table->string('english_level');
            $table->tinyInteger('gender');
            $table->string('work_type');
            $table->string('working_hours');
            $table->string('description');
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
