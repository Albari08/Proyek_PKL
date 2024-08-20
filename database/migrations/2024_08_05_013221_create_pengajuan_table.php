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
        Schema::create('pengajuan', function (Blueprint $table) {
            $table->id();
            $table->string('noSurat')->unique();
            $table->bigInteger('noPR');
            $table->string('tanggal');
            $table->string('spph');
            $table->string('namaBarang');
            $table->string('deliveryDate');
            $table->string('catatan')->nullable();
            $table->string('jawaban')->nullable();
            $table->bigInteger('hargaTotal')->nullable();
            $table->bigInteger('hargaEstimasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};
