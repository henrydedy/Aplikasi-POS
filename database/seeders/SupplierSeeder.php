<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('suppliers')->insert([
            [
                'nama' => 'Unilever',
                'alamat' => 'Denpasar',
                'nohp' => '(0361) 952502',
                'keterangan' => 'Supplier Walls',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Bulan Bersinar Grosir',
                'alamat' => 'Gianyar',
                'nohp' => '82339639420',
                'keterangan' => 'Grosir Snack dan Wafer',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Bangkit Jaya Grosir',
                'alamat' => 'Gianyar',
                'nohp' => '0822 5456 1547',
                'keterangan' => 'Grosir Sembako',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Pt Sampoerna dan Grosir',
                'alamat' => 'Denpasar',
                'nohp' => '0852 2345 6578',
                'keterangan' => 'Seles Rokok',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Cimory Group',
                'alamat' => 'Denpasar',
                'nohp' => '0853 6578 9111',
                'keterangan' => 'Seles Cimory',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Aqua',
                'alamat' => 'Gianyar',
                'nohp' => '0822 4443 6545 2585',
                'keterangan' => 'Seles Aqua',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Grosir Bintang Asia',
                'alamat' => 'Denpasar',
                'nohp' => '0811 2233 4455',
                'keterangan' => 'Grosir Minuman',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Bir Bintang',
                'alamat' => 'Denpasar',
                'nohp' => '0898 9889 4532',
                'keterangan' => 'Seles Bir',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Sinar Mayuri',
                'alamat' => 'Badung',
                'nohp' => '0822 3355 4585',
                'keterangan' => 'Seles Sabun dan Sampoo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Sumber Grosir ATK',
                'alamat' => 'Gianyar',
                'nohp' => '0812 3374 5655',
                'keterangan' => 'Grosir Alat Tulis',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
