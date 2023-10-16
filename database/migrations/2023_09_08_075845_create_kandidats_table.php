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
        Schema::create('kandidats', function (Blueprint $table) {
            $table->id();
            $table->integer('nik');
            $table->unsignedBigInteger('user_id');
            $table->string('jenis_kelamin');
            $table->integer('nik');
            $table->string('name');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('asal_sekolah');
            $table->string('jurusan');
            $table->string('no_wa');
            $table->string('dosis_vaksin');
            $table->string('ijazah');
            $table->string('kk');
            $table->string('ktp');
            $table->string('sks');
            $table->string('akta_kelahiran');
            $table->string('skck');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kandidats');
    }
};
