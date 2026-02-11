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
        Schema::create('migratecertificates', function (Blueprint $table) {
            $table->id();
            $table->string('mg_no');
            $table->string('application_date')->nullable();
            $table->string('issue_date')->nullable();
            $table->string('student_id');
            $table->string('from_date')->nullable();
            $table->string('to_date')->nullable();
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
        Schema::dropIfExists('migratecertificates');
    }
};
