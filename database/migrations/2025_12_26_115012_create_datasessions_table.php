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
        Schema::create('datasessions', function (Blueprint $table) {
            $table->id();
            $table->string('session_name');
            $table->string('start_date');
            $table->string('end_date');
            // $table->json('classes')->nullable();
            $table->string('admin_username')->nullable();
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
        Schema::dropIfExists('datasessions');
    }
};
