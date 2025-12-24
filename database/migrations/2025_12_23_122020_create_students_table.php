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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->string('name');
            $table->string('gender');
            $table->string('dob');
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('religion');
            $table->string('blood_group')->nullable();
            $table->string('phone');
            $table->string('email');
            $table->text('address');
            $table->string('class');
            $table->string('section');
            $table->boolean('status')->default(1);
            $table->json('additional_data')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
