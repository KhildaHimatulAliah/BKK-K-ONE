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
        Schema::create('page_footers', function (Blueprint $table) {
            $table->id();
            $table->string('gambar_1');
            $table->string('gambar_2');
            $table->string('judul_1');
            $table->string('judul_2');
            $table->text('text_1');
            $table->text('text_2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_footers');
    }
};
