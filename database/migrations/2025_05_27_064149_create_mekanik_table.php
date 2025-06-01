<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('mekanik', function (Blueprint $table) {
        $table->id();
        $table->string('nama', 100)->nullable();
        $table->string('telepon', 20)->nullable();
        $table->enum('status', ['aktif', 'tidak aktif'])->default('aktif');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mekanik');
    }
};
