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
        Schema::create('sims', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('jenis_permohonan');
            $table->string('tgl_datang');
            $table->string('gol_sim');
            $table->string('tinggi');
            $table->string('berkacamata');
            $table->string('cacat_fisik');
            $table->string('sim');
            $table->string('jenis_sim');
            $table->string('foto_sim_lama');
            $table->string('masa_berlaku_sim');
            $table->string('surat_sehat');
            $table->string('surat_psikologi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sims');
    }
};