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
        Schema::create('appdatas', function (Blueprint $table) {
            $table->id();
            $table->string('school_code');
            $table->string('title')->nullable();
            $table->string('logo')->nullable();
            $table->string('signature')->nullable();
            $table->string('stamp')->nullable();
            $table->string('director_name')->nullable();
            // $table->string('contact_person');
            $table->string('primary_phone')->nullable();
            $table->string('secondary_phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('school_hours')->nullable();
            $table->string('school_time')->nullable();
            // no checkout before min_time, no check in after min_time
            $table->string('late_time')->nullable();
            // $table->string('address')->nullable();
            // admin_username is super admin
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
        Schema::dropIfExists('appdatas');
    }
};
