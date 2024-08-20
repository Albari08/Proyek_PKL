<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Schema::disableForeignKeyConstraints();
        // Role::truncate();
        // Schema::enableForeignKeyConstraints();

        
        DB::table('role')->insert([
            'id' => 1,
            'namaRole' => 'Admin',
        ]);

        DB::table('role')->insert([
            'id' => 2,
            'namaRole' => 'Adm. Pengadaan',
        ]);

        DB::table('role')->insert([
            'id' => 3,
            'namaRole' => 'Buyer',
        ]);

        DB::table('role')->insert([
            'id' => 4,
            'namaRole' => 'Adm. Perencanaan',
        ]);

        DB::table('role')->insert([
            'id' => 5,
            'namaRole' => 'Planner',
        ]);
    }
}
