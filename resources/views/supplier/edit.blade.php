@extends('layout.app')

@section('title', ' - Edit')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Supplier Barang</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header bg-white">
                    <h4>Edit Data Supplier Barang</h4>
                </div>
                <div class="card-body">
                    <form action="/{{ auth()->user()->level }}/supplier/{{ $supplier->id }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" value="{{ $supplier->alamat }}" name="alamat">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Supplier</label>
                            <input type="text" class="form-control" value="{{ $supplier->nama }}" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="nohp">No Handphone</label>
                            <input type="text" class="form-control" value="{{ $supplier->nohp }}" name="nohp">
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <input type="text" class="form-control" value="{{ $supplier->keterangan }}"
                                name="keterangan">
                        </div>
                        <a href="/{{ auth()->user()->level }}/supplier" class="btn btn-sm btn-outline-warning"><i
                                class="fas fa-caret-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i>
                            Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
