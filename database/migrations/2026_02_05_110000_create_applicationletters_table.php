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
        Schema::create('applicationletters', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('description');
            $table->string('date')->nullable();
            $table->string('admin_username')->nullable();
            // status => 0 = under review, 1 = Approved, 2 = Rejected
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('applicationletters');
    }
};
