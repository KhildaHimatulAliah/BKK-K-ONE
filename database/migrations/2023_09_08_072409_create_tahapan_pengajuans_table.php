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
        Schema::create('tahapan_pengajuans', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->unsignedBigInteger('id_tahapan');
            $table->unsignedBigInteger('id_pengajuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tahapan_pengajuans');
    }
};
