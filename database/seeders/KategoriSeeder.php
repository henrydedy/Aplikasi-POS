<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategoris')->insert([
            ['nama' => 'Es Krim', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Wafer', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Snack', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Sembako', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Rokok', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Yogurt', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Minuman', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'HomeCare', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'BodyCare', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'ATK', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
