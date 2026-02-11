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
        Schema::create('eventcertificates', function (Blueprint $table) {
            $table->id();
            $table->string('ev_no');
            $table->string('event')->nullable();
            $table->string('issue_date')->nullable();
            $table->string('student_id');
            $table->string('achievment_in')->nullable();
            $table->string('rank')->nullable();
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
        Schema::dropIfExists('eventcertificates');
    }
};
