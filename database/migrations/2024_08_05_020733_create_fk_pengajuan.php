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
        Schema::table('pengajuan', function (Blueprint $table) {
            // Foreign key
            $table->foreignId('status_id')->after('tanggal')->constrained(
                table: 'status', indexName: 'status'
            )->onUpdate('cascade')->onDelete('cascade');

            $table->foreignId('konfirmasi_id')->after('noPR')->constrained(
                table: 'konfirmasi', indexName: 'konfirmasi'
            )->onUpdate('cascade')->onDelete('cascade');

            $table->foreignId('user_id')->after('status_id')->constrained(
                table: 'users', indexName: 'users'
            )->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $table->dropForeign(['status', 'konfirmasi', 'users']);
    }
};
