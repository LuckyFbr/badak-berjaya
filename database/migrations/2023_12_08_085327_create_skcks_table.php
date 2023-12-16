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
        Schema::create('skcks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('tgl_datang');
            $table->string('foto_skck_lama');
            $table->string('keperluan');
            $table->string('rumus_sdk_jari_kanan');
            $table->string('rumus_sdk_jari_kiri');
            $table->string('pas_foto');
            $table->string('cara_bayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skcks');
    }
};