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
        Schema::create('profiles', function (Blueprint $table) {

            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('pendidikan_terakhir');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('pekerjaan');
            $table->string('Alamat');
            $table->string('provinsi');
            $table->string('Kabupaten');
            $table->string('Kecamatan');
            $table->string('desa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};