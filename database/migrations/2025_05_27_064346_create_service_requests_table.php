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
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date_time');
            $table->string('owner_name');
            $table->string('vehicle_name');
            $table->string('vehicle_reg_no');
            $table->foreignId('assigned_to')->constrained('mekanik');
            $table->string('service');
            $table->enum('status', ['pending', 'confirmed', 'on-progress', 'done', 'cancelled'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_requests');
    }
};
