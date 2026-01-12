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
        Schema::create('studenthomeworks', function (Blueprint $table) {
            $table->id();
            $table->string('homework_id');
            $table->string('student_id');
            $table->string('class_id')->nullable();
            $table->string('section_id')->nullable();
            $table->string('description')->nullable();
            $table->string('upload')->nullable();
            // status => 0 = NOT DONE, 1 = CHECKING, 2 = DONE
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('studenthomeworks');
    }
};
