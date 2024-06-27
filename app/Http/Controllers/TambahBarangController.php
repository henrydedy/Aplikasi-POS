<?php

namespace App\Http\Controllers;

use App\Models\TambahBarang;
use App\Models\Kategori;
use App\Models\Satuan;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Carbon\Carbon;


class TambahBarangController extends Controller
{
    public function index()
    {
        $barang = TambahBarang::all();
        $kategori = Kategori::all();
        $satuan = Satuan::all();
        $supplier = Supplier::all();

        $now = Carbon::now();
        $tahun_bulan = $now->year . $now->month;
        $cek = TambahBarang::count();

        if ($cek == 0) {
            $kodepembelian = 100001;
            $kodepembelian = $tahun_bulan . $kodepembelian;
        } else {
            $ambil = TambahBarang::latest()->first();
            $kodepembelian = (int) substr($ambil->kodepembelian, -6) + 1;
            $kodepembelian = $tahun_bulan . $kodepembelian;
        }

        return view('tambahbarang.index', compact('barang', 'kodepembelian', 'supplier'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $barang = TambahBarang::where('kodepembelian', 'like', '%' . $search . '%')
            ->orWhere('nama', 'like', '%' . $search . '%')
            ->paginate(10);

        return view('tambahbarang.index', compact('barang'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'kodepembelian' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'harga_beli' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'supplier_id' => 'required|exists:suppliers,id',
            'stok' => 'required|integer|min:0',
        ]);

        try {
            $barang = new TambahBarang;
            $barang->kodepembelian = $request->kodepembelian;
            $barang->nama = $request->nama;
            $barang->harga_beli = $request->harga_beli;
            $barang->harga_jual = $request->harga_jual;
            $barang->supplier_id = $request->supplier_id;
            $barang->stok = $request->stok;
            $barang->save();

            return redirect('/admin/tambahbarang')->with('sukses', 'Data Berhasil di Simpan');
        } catch (\Exception $e) {
            return redirect('/admin/tambahbarang')->with('gagal', 'Data Tidak Berhasil di Simpan. Pesan Kesalahan: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $barang = TambahBarang::findOrFail($id);
        $supplier = Supplier::all();

        return view('tambahbarang.view', compact('barang', 'supplier'));
    }

    public function edit($id)
    {
        $barang = TambahBarang::findOrFail($id);
        $supplier = Supplier::all();

        return view('tambahbarang.edit', compact('barang', 'supplier'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'harga_beli' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'supplier_id' => 'required|exists:suppliers,id',
            'stok' => 'required|integer|min:0',
        ]);

        try {
            $barang = TambahBarang::findOrFail($id);
            $barang->update($request->all());
            return redirect('/admin/tambahbarang')->with('sukses', 'Data Berhasil di Edit');
        } catch (\Exception $e) {
            return redirect('/admin/tambahbarang')->with('gagal', 'Data Tidak Berhasil di Edit. Pesan Kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $barang = TambahBarang::findOrFail($id);
            $barang->delete();
            return redirect('/admin/tambahbarang')->with('sukses', 'Data Berhasil di Hapus');
        } catch (\Exception $e) {
            return redirect('/admin/tambahbarang')->with('gagal', 'Data Tidak Berhasil di Hapus. Pesan Kesalahan: ' . $e->getMessage());
        }
    }
}
