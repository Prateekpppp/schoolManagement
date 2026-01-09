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
            $table->string('admin_username');
            $table->string('school_code');
            $table->string('title');
            $table->string('logo');
            $table->string('signature');
            $table->string('stamp');
            $table->string('director_name');
            // $table->string('contact_person');
            $table->string('primary_phone')->nullable();
            $table->string('secondary_phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
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
        Schema::dropIfExists('appdatas');
    }
};
