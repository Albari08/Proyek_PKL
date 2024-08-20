<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Konfirmasi;
use Illuminate\Support\Facades\Schema;


class KonfirmasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Konfirmasi::truncate();
        Schema::enableForeignKeyConstraints();

        DB::table('konfirmasi')->insert([
            'konfirmasi' => 'Pembelian',
        ]);

        DB::table('konfirmasi')->insert([
            'konfirmasi' => 'Spesifikasi',
        ]);
    }
}
