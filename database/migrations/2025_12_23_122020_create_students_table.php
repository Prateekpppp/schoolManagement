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
            // photo size limit 2mb 150x150(in jquery)
            // student details

            // first 3 digits of school _456758 unique, show on admission form with reed only
            $table->string('enrollment_no')->unique();
            $table->string('admission_no')->unique();
            $table->string('photo');
            $table->string('name');
            $table->string('dob');
            $table->string('gender');
            // status 1 = male, 2 = female, 3 = other
            $table->string('religion');
            $table->string('blood_group')->nullable();
            $table->string('caste');
            $table->string('city');
            $table->string('state');
            $table->string('address');
            $table->string('phone')->nullable();
            $table->string('email');
            $table->string('password');

            // class details
            $table->string('class');
            $table->string('section');
            $table->string('roll_no')->unique();

            // sibling option in form
            $table->string('sibling_id')->nullable();

            // parent details
            $table->string('father_name');
            $table->string('father_phone');
            $table->string('father_occupation');
            $table->string('mother_name');
            $table->string('mother_phone');
            $table->string('mother_occupation');
            $table->string('parent_email');
            $table->string('parent_password');
            // other details
            // $table->string('fee');
            $table->string('id_proof_front');
            $table->string('id_proof_back');
            $table->string('qrcode')->nullable();
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
        Schema::dropIfExists('students');
    }
};
