<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;
use App\Traits\HasFormatRupiah;

class TambahBarang extends Model
{
    use HasFactory;
    use HasFormatRupiah;

    protected $fillable = [
        'kodepembelian',
        'supplier_id',
        'barang_id',
        'totalpembelian',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
