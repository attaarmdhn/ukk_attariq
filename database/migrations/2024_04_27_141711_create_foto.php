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
        Schema::create('foto', function (Blueprint $table) {
            $table->id();
            $table->string('judulFoto');
            $table->string('deskripsiFoto');
            $table->date('tanggalUnggah');
            $table->string('lokasiFile');
            $table->foreignId('albumId')->constrained('album')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('userId')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foto');
    }
};
