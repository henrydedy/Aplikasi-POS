<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('barangs')->insert([
            [
                'kode' => '8999999516802',
                'nama' => 'CORNETTO CLASSIC BLK & WHT JR',
                'kategori_id' => 1,
                'harga_beli' => 4800.00,
                'harga_jual' => 6000.00,
                'satuan_id' => 1,
                'supplier_id' => 1,
                'stok' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode' => '8999999513757',
                'nama' => 'CORNETTO DISC OREO 110 ML',
                'kategori_id' => 1,
                'harga_beli' => 8000.00,
                'harga_jual' => 10000.00,
                'satuan_id' => 1,
                'supplier_id' => 1,
                'stok' => 19,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode' => '212.001',
                'nama' => 'CORNETTO MINI',
                'kategori_id' => 1,
                'harga_beli' => 2000.00,
                'harga_jual' => 2500.00,
                'satuan_id' => 1,
                'supplier_id' => 1,
                'stok' => 12,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode' => '8999999534271',
                'nama' => 'CORNETTO ROYALE UNICORN',
                'kategori_id' => 1,
                'harga_beli' => 6909.00,
                'harga_jual' => 9500.00,
                'satuan_id' => 1,
                'supplier_id' => 1,
                'stok' => 6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode' => '8999999539450',
                'nama' => 'CORNETTO SILVER QUEEN',
                'kategori_id' => 1,
                'harga_beli' => 9600.00,
                'harga_jual' => 12000.00,
                'satuan_id' => 1,
                'supplier_id' => 1,
                'stok' => 14,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode' => '8999999516803',
                'nama' => 'MAGNUM CLASSIC',
                'kategori_id' => 1,
                'harga_beli' => 12000.00,
                'harga_jual' => 15000.00,
                'satuan_id' => 1,
                'supplier_id' => 1,
                'stok' => 10,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode' => '8999999516804',
                'nama' => 'MAGNUM ALMOND',
                'kategori_id' => 1,
                'harga_beli' => 12000.00,
                'harga_jual' => 15000.00,
                'satuan_id' => 1,
                'supplier_id' => 1,
                'stok' => 8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode' => '8999999516805',
                'nama' => 'MAGNUM WHITE',
                'kategori_id' => 1,
                'harga_beli' => 12000.00,
                'harga_jual' => 15000.00,
                'satuan_id' => 1,
                'supplier_id' => 1,
                'stok' => 7,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode' => '8999999516806',
                'nama' => 'MAGNUM GOLD',
                'kategori_id' => 1,
                'harga_beli' => 12000.00,
                'harga_jual' => 15000.00,
                'satuan_id' => 1,
                'supplier_id' => 1,
                'stok' => 9,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode' => '8999999516807',
                'nama' => 'MAGNUM DOUBLE CHOCOLATE',
                'kategori_id' => 1,
                'harga_beli' => 12000.00,
                'harga_jual' => 15000.00,
                'satuan_id' => 1,
                'supplier_id' => 1,
                'stok' => 11,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode' => '8999999516808',
                'nama' => 'MAGNUM DOUBLE CARAMEL',
                'kategori_id' => 1,
                'harga_beli' => 12000.00,
                'harga_jual' => 15000.00,
                'satuan_id' => 1,
                'supplier_id' => 1,
                'stok' => 13,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode' => '8999999516809',
                'nama' => 'MAGNUM DOUBLE RASPBERRY',
                'kategori_id' => 1,
                'harga_beli' => 12000.00,
                'harga_jual' => 15000.00,
                'satuan_id' => 1,
                'supplier_id' => 1,
                'stok' => 15,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode' => '8999999516810',
                'nama' => 'MAGNUM DOUBLE MINT',
                'kategori_id' => 1,
                'harga_beli' => 12000.00,
                'harga_jual' => 15000.00,
                'satuan_id' => 1,
                'supplier_id' => 1,
                'stok' => 17,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode' => '8999999516811',
                'nama' => 'MAGNUM DOUBLE COCONUT',
                'kategori_id' => 1,
                'harga_beli' => 12000.00,
                'harga_jual' => 15000.00,
                'satuan_id' => 1,
                'supplier_id' => 1,
                'stok' => 18,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode' => '8999999516812',
                'nama' => 'MAGNUM DOUBLE MANGO',
                'kategori_id' => 1,
                'harga_beli' => 12000.00,
                'harga_jual' => 15000.00,
                'satuan_id' => 1,
                'supplier_id' => 1,
                'stok' => 20,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode' => '8999999516813',
                'nama' => 'MAGNUM DOUBLE BLUEBERRY',
                'kategori_id' => 1,
                'harga_beli' => 12000.00,
                'harga_jual' => 15000.00,
                'satuan_id' => 1,
                'supplier_id' => 1,
                'stok' => 22,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
