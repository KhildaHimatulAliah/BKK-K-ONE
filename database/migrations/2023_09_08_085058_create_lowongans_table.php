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
        Schema::create('lowongans', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->unsignedBigInteger('id_perusahaan');
            $table->date('tanggal_publish');
            $table->date('tanggal_berakhir');
            $table->string('posisi_lowongan');
            $table->unsignedBigInteger('id_tahapan');
            $table->string('name');
            $table->text('deskripsi');
            $table->text('keahlian');
            $table->text('kualifikasi');
            $table->string('kategori_jurusan');
            $table->text('informasi_lainnya');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lowongans');
    }
};
