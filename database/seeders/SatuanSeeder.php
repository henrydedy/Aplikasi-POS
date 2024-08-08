<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('satuans')->insert([
            ['nama' => 'Pcs', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Karung', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Dus', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Galon', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
