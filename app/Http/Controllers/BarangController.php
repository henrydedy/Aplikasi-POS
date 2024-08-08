<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Satuan;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        $kategori = Kategori::all();
        $satuan = Satuan::all();
        $supplier = Supplier::all();

        $now = Carbon::now();
        $tahun_bulan = $now->year . $now->month;
        $cek = Barang::count();

        if ($cek == 0) {
            $kode = 100001;
            $kode = $tahun_bulan . $kode;
        } else {
            $ambil = Barang::latest()->first();
            $kode = (int) substr($ambil->kode, -6) + 1;
            $kode = $tahun_bulan . $kode;
        }

        return view('barang.index', compact('barang', 'kategori', 'satuan', 'kode', 'supplier'));
    }
    public function search(Request $request)
    {
        $search = $request->get('search');
        $barang = Barang::where('kode', 'like', '%' . $search . '%')
            ->orWhere('nama', 'like', '%' . $search . '%')
            ->paginate(10);

        return view('barang.index', compact('barang'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'harga_beli' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'satuan_id' => 'required|exists:satuans,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'stok' => 'required|integer|min:0',
        ]);

        try {
            $barang = new Barang;
            $barang->kode = $request->kode;
            $barang->nama = $request->nama;
            $barang->kategori_id = $request->kategori_id;
            $barang->harga_beli = $request->harga_beli;
            $barang->harga_jual = $request->harga_jual;
            $barang->satuan_id = $request->satuan_id;
            $barang->supplier_id = $request->supplier_id;
            $barang->stok = $request->stok;
            $barang->save();

            return redirect('/admin/barang')->with('sukses', 'Data Berhasil di Simpan');
        } catch (\Exception $e) {
            return redirect('/admin/barang')->with('gagal', 'Data Tidak Berhasil di Simpan. Pesan Kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        $kategori = Kategori::all();
        $satuan = Satuan::all();
        $supplier = Supplier::all();

        return view('barang.view', compact('barang', 'kategori', 'satuan', 'supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $kategori = Kategori::all();
        $satuan = Satuan::all();
        $supplier = Supplier::all();

        return view('barang.edit', compact('barang', 'kategori', 'satuan', 'supplier'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'harga_beli' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'satuan_id' => 'required|exists:satuans,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'stok' => 'required|integer|min:0',
        ]);

        try {
            $barang = Barang::findOrFail($id);
            $barang->update($request->all());
            return redirect('/admin/barang')->with('sukses', 'Data Berhasil di Edit');
        } catch (\Exception $e) {
            return redirect('/admin/barang')->with('gagal', 'Data Tidak Berhasil di Edit. Pesan Kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $barang = Barang::findOrFail($id);
            $barang->delete();
            return redirect('/admin/barang')->with('sukses', 'Data Berhasil di Hapus');
        } catch (\Exception $e) {
            return redirect('/admin/barang')->with('gagal', 'Data Tidak Berhasil di Hapus. Pesan Kesalahan: ' . $e->getMessage());
        }
    }
}
