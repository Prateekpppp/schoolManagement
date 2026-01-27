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
        Schema::create('staff_attendances', function (Blueprint $table) {
            $table->id();
            $table->string('staff_id');
            $table->string('date');
            $table->string('checkout');
            // status => 0 = absent, 1 = present, 2 = late, 3 = half day, 4 = leave
            $table->tinyInteger('status')->default(0);
            $table->text('remark')->nullable();
            $table->string('admin_username')->nullable();
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
        Schema::dropIfExists('staff_attendances');
    }
};
