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
        Schema::create('formal_education', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained('profile')->onDelete('cascade');
            $table->string('tmt');         // Periode: 1998 - 2004
            $table->string('degree');      // S-1 TEKNIK SIPIL
            $table->string('institution'); // UNIVERSITAS SEBELAS MARET
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formal_education');
    }
};
