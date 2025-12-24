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
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('gender');
            $table->text('address');
            $table->string('subject');
            $table->string('religion')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('class')->nullable();
            $table->string('section')->nullable();
            // status = 0 = inactive, 1 = teacher, 2 = principal, 3 = liberarian, 4 = others
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
        Schema::dropIfExists('staff');
    }
};
