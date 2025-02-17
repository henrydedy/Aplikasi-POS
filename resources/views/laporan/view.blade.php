@extends('layout.app')

@section('title', ' - Detail Laporan')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Laporan</h1>
        </div>

        <div class="section-body">
            <div class="card shadow">
                <div class="card-header bg-white">
                    <h4 class="text-primary">Detail Laporan</h4>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode transaksi</th>
                                <th>Nama</th>
                                @if (auth()->user()->level == 'admin')
                                    <th>Harga_beli</th>
                                @endif
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Total</th>
                                @if (auth()->user()->level == 'admin')
                                    <th>Total_beli</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->kode_transaksi }}</td>
                                    <td>{{ $item->barang }}</td>
                                    @if (auth()->user()->level == 'admin')
                                        <td>{{ $item->formatRupiah('harga_beli') }}</td>
                                    @endif
                                    <td>{{ $item->formatRupiah('harga') }}</td>
                                    <td>{{ $item->jumlah }}</td>
                                    <td>{{ $item->formatRupiah('total') }}</td>
                                    @if (auth()->user()->level == 'admin')
                                        <td>{{ $item->formatRupiah('total_beli') }}</td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer bg-white">
                    <a href="/{{ auth()->user()->level }}/laporan" class="btn btn-sm btn-outline-warning"><i
                            class="fas fa-caret-left"></i> Kembali</a>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
@endpush
