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
            $table->string('employ_code');
            $table->string('name');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('dob')->nullable();
            $table->string('aadhaar_no');
            $table->string('gender');
            $table->string('religion')->nullable();
            $table->string('blood_group')->nullable();
            $table->text('address');
            $table->string('salary');
            $table->string('joining_date');
            $table->string('subject')->nullable();
            $table->string('class')->nullable();
            $table->string('section')->nullable();
            $table->string('id_proof_front');
            $table->string('id_proof_back');
            $table->string('driving_license')->nullable();
            $table->string('other_document')->nullable();
            $table->string('qualification')->nullable();
            $table->string('admin_username')->nullable();
            // status = 0 = inactive, 1 = teacher, 2 = staff, 3 = drivers, 4 = others
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
        Schema::dropIfExists('staff');
    }
};
