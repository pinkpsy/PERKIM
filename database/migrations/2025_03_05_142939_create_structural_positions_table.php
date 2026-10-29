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
        Schema::create('structural_positions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained('profile')->onDelete('cascade');
            $table->string('period');          // TMT: 2024 - Sekarang
            $table->string('position_name');   // Nama Jabatan
            $table->string('skpd')->nullable(); // SKPD
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('structural_positions');
    }
};
