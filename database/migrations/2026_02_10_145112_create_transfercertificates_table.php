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
        Schema::create('transfercertificates', function (Blueprint $table) {
            $table->id();
            $table->string('tc_no');
            $table->string('application_date')->nullable();
            $table->string('issue_date')->nullable();
            $table->string('student_id');
            $table->string('start_class')->nullable();
            $table->string('end_class')->nullable();
            $table->string('ncc')->nullable();
            $table->string('game_played')->nullable();
            $table->string('feedue')->default(0);
            $table->string('concession')->nullable();
            $table->string('failed_last_class')->nullable();
            // $table->string('qualified_for_promotion')->nullable();
            $table->string('reason')->nullable();
            $table->string('behaviour')->nullable();
            $table->string('remark')->nullable();
            $table->string('nationality')->nullable();
            $table->string('last_exam')->nullable();
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
        Schema::dropIfExists('transfercertificates');
    }
};
