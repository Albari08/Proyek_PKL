<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('status')->insert([
            'id' => 1,
            'status' => 'Draft',
        ]);

        DB::table('status')->insert([
            'id' => 2,
            'status' => 'Belum Dijawab',
        ]);

        DB::table('status')->insert([
            'id' => 3,
            'status' => 'Draft Jawaban',
        ]);

        DB::table('status')->insert([
            'id' => 4,
            'status' => 'Sent',
        ]);
    }
}
