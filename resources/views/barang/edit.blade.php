@extends('layout.app')

@section('title', ' - Edit')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Data Barang</h1>
        </div>

        <div class="section-body">
            <div class="card shadow">
                <div class="card-header bg-white">
                    <h4>Edit Data Barang</h4>
                </div>
                <div class="card-body">
                    <form action="{{ url('/' . auth()->user()->level . '/barang/' . $barang->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kode">Barcode</label>
                                    <input type="text" class="form-control" name="kode" value="{{ $barang->kode }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" name="nama" value="{{ $barang->nama }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="harga_beli">Harga Beli</label>
                                    <input type="text" class="form-control jumlah" id="harga-beli" name="harga_beli"
                                        value="{{ $barang->harga_beli }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="harga_jual">Harga Jual</label>
                                    <input type="text" class="form-control jumlah" id="harga-jual" name="harga_jual"
                                        value="{{ $barang->harga_jual }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="stok">Stok</label>
                                    <input type="number" class="form-control jumlah" name="stok"
                                        value="{{ $barang->stok }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select class="custom-select" name="kategori_id">
                                        @foreach ($kategori as $kategoriItem)
                                            <option value="{{ $kategoriItem->id }}"
                                                {{ $kategoriItem->id == $barang->kategori_id ? 'selected' : '' }}>
                                                {{ $kategoriItem->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="satuan">Satuan</label>
                                    <select class="custom-select" name="satuan_id">
                                        @foreach ($satuan as $satuanItem)
                                            <option value="{{ $satuanItem->id }}"
                                                {{ $satuanItem->id == $barang->satuan_id ? 'selected' : '' }}>
                                                {{ $satuanItem->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="supplier">Supplier</label>
                                    <select class="custom-select" name="supplier_id">
                                        @foreach ($supplier as $supplierItem)
                                            <option value="{{ $supplierItem->id }}"
                                                {{ $supplierItem->id == $barang->supplier_id ? 'selected' : '' }}>
                                                {{ $supplierItem->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('/' . auth()->user()->level . '/barang') }}"
                            class="btn btn-sm btn-outline-warning"><i class="fas fa-caret-left"></i> Kembali</a>
                        <button type="submit" class="btn btn-sm btn-outline-primary"><i class="fas fa-save"></i>
                            Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('.jumlah').on('input', function() {
                if ($(this).val() < 0) {
                    $(this).val(0);
                }
            });
        });

        // Mengambil elemen input
        var harga_beli = document.getElementById('harga-beli');
        var harga_jual = document.getElementById('harga-jual');

        // Menambahkan event listener untuk setiap kali ada input
        harga_beli.addEventListener('input', function() {
            // Mengganti nilai input hanya dengan karakter angka
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        // Menambahkan event listener untuk setiap kali ada input
        harga_jual.addEventListener('input', function() {
            // Mengganti nilai input hanya dengan karakter angka
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>
@endpush
