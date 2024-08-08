<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Barang;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'nohp',
        'keterangan',
    ];

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }
}
