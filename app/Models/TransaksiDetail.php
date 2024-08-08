<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasFormatRupiah;

class TransaksiDetail extends Model
{
    use HasFactory;
    use HasFormatRupiah;

    protected $fillable = [
        'kode_transaksi',
        'barang',
        'harga',
        'harga_beli',
        'jumlah',
        'total',
        'total_beli',
    ];
}
