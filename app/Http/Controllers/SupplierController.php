<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplier = Supplier::all();
        return view('supplier.index', compact('supplier'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'kode_supplier' => 'required|string|max:255',
                'nama' => 'required|string|max:255',
                'nohp' => 'required|string|max:255',
                'keterangan' => 'required|string|max:255',
            ]);

            $supplier = new Supplier;
            $supplier->kode_supplier = $request->kode_supplier;
            $supplier->nama = $request->nama;
            $supplier->nohp = $request->nohp;
            $supplier->keterangan = $request->keterangan;
            $supplier->save();


            return redirect('/admin/supplier')->with('sukses', 'Data Berhasil di Simpan');
        } catch (\Exception $e) {
            return redirect('/admin/supplier')->with('gagal', 'Data Tidak Berhasil di Simpan. Pesan Kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $supplier = Supplier::find($id);

        return view('supplier.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'kode_supplier' => 'required|string|max:255',
                'nama' => 'required|string|max:255',
                'nohp' => 'required|string|max:255',
                'keterangan' => 'required|string|max:255',
            ]);

            $supplier = Supplier::find($id);
            $supplier->kode_supplier = $request->kode_supplier;
            $supplier->nama = $request->nama;
            $supplier->nohp = $request->nohp;
            $supplier->keterangan = $request->keterangan;
            $supplier->update();

            return redirect('/admin/supplier')->with('sukses', 'Data Berhasil di Edit');
        } catch (\Exception $e) {
            return redirect('/admin/supplier')->with('gagal', 'Data Tidak Berhasil di Edit. Pesan Kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();

        return redirect('/admin/supplier')->with('sukses', 'Data Berhasil di Hapus');
    }
}
