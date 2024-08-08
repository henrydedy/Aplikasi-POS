@extends('layout.app')

@section('title', ' - Laporan')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Laporan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="/{{ auth()->user()->level }}/laporan">Laporan</a></div>
                <div class="breadcrumb-item">Cari Laporan</div>
            </div>
        </div>
        @if (auth()->user()->level == 'admin' || auth()->user()->level == 'owner')

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-success">
                            <p><span class="font-weight-bold">Laporan Tanggal: {{ $dari }} Sampai
                                    {{ $sampai }}</span></p>
                        </div>
                        <div class="card shadow">
                            <div class="card-header bg-white justify-content-center">
                                <form action="/{{ auth()->user()->level }}/laporan/cari">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group d-flex">
                                                <label class="mr-1" for="nama">Dari</label>
                                                <input type="date" class="form-control" name="dari"
                                                    value="{{ $dari }}" max="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group d-flex">
                                                <label class="mr-1" for="nama">Sampai</label>
                                                <input type="date" class="form-control" name="sampai"
                                                    value="{{ $sampai }}" max="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-sm btn-success"><i
                                                        class="fa fa-search"></i> Cari</button>
                                                <a href="/{{ auth()->user()->level }}/laporan/{{ $dari }}/{{ $sampai }}/print"
                                                    class="btn btn-sm btn-danger" target="_blank"><i
                                                        class="fa fa-print"></i>
                                                    Print</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body p-2">
                                <table class="table table-hover" id="table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode Transaksi</th>
                                            <th>Tanggal</th>
                                            <th>Kode Kasir</th>
                                            <th>Total</th>
                                            <th>Bayar</th>
                                            <th>Kembali</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $total_penjualan = 0;
                                        $total_pembelian = 0; ?>
                                        @foreach ($transaksi as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->kode_transaksi }}</td>
                                                <td>{{ $item->tanggal }}</td>
                                                <td>{{ $item->kode_kasir }}</td>
                                                <td>{{ $item->formatRupiah('total') }}</td>
                                                <td>{{ $item->formatRupiah('bayar') }}</td>
                                                <td>{{ $item->formatRupiah('kembali') }}</td>
                                                <td>
                                                    <a href="/{{ auth()->user()->level }}/laporan/{{ $item->kode_transaksi }}/print"
                                                        target="_blank" class="btn btn-sm btn-outline-danger"><i
                                                            class="fa fa-print"></i> Print</a>
                                                </td>
                                            </tr>
                                            <?php $total_penjualan += $item->total; ?>
                                            <?php $total_pembelian += $item->total_beli; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <div class="card text-center">
                                            <div class="card-body">
                                                <i class="fa fa-shopping-cart fa-2x mb-2 text-primary"></i>
                                                <h5 class="card-title">Total Penjualan</h5>
                                                <p class="card-text">
                                                    <strong
                                                        style="font-size: 20px">{{ number_format($total_penjualan, 0, ',', '.') }}</strong>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card text-center">
                                            <div class="card-body">
                                                <i class="fa fa-shopping-bag fa-2x mb-2 text-success"></i>
                                                <h5 class="card-title">Total Pembelian</h5>
                                                <p class="card-text">
                                                    <strong
                                                        style="font-size: 20px">{{ number_format($total_pembelian, 0, ',', '.') }}</strong>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card text-center">
                                            <div class="card-body">
                                                <i class="fa fa-money-bill-wave fa-2x mb-2 text-warning"></i>
                                                <h5 class="card-title">Total Keuntungan</h5>
                                                <p class="card-text">
                                                    <strong
                                                        style="font-size: 20px">{{ number_format($total_penjualan - $total_pembelian, 0, ',', '.') }}</strong>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif


        @if (auth()->user()->level == 'kasir')

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-success">
                            <p><span class="font-weight-bold">Laporan Tanggal: {{ $dari }} Sampai
                                    {{ $sampai }}</span></p>
                        </div>
                        <div class="card shadow">
                            <div class="card-header bg-white justify-content-center">
                                <form action="/{{ auth()->user()->level }}/laporan/cari">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group d-flex">
                                                <label class="mr-1" for="nama">Dari</label>
                                                <input type="date" class="form-control" name="dari"
                                                    value="{{ $dari }}" max="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group d-flex">
                                                <label class="mr-1" for="nama">Sampai</label>
                                                <input type="date" class="form-control" name="sampai"
                                                    value="{{ $sampai }}" max="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-sm btn-success"><i
                                                        class="fa fa-search"></i> Cari</button>
                                                {{-- <a href="/{{ auth()->user()->level }}/laporan/{{ $dari }}/{{ $sampai }}/print"
                                                    class="btn btn-sm btn-danger" target="_blank"><i
                                                        class="fa fa-print"></i>
                                                    Print</a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body p-2">
                                <table class="table table-hover" id="table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode Transaksi</th>
                                            <th>Tanggal</th>
                                            <th>Total</th>
                                            <th>Bayar</th>
                                            <th>Kembali</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $total_penjualan = 0;
                                        $total_pembelian = 0; ?>
                                        @foreach ($transaksi as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->kode_transaksi }}</td>
                                                <td>{{ $item->tanggal }}</td>
                                                <td>{{ $item->formatRupiah('total') }}</td>
                                                <td>{{ $item->formatRupiah('bayar') }}</td>
                                                <td>{{ $item->formatRupiah('kembali') }}</td>
                                                <td>
                                                    <a href="/{{ auth()->user()->level }}/laporan/{{ $item->kode_transaksi }}/print"
                                                        target="_blank" class="btn btn-sm btn-outline-danger"><i
                                                            class="fa fa-print"></i> Print</a>
                                                </td>
                                            </tr>
                                            <?php $total_penjualan += $item->total; ?>
                                            <?php $total_pembelian += $item->total_beli; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{-- <div class="row mt-3">
                                    <div class="col-md-4">
                                        <div class="card text-center">
                                            <div class="card-body">
                                                <i class="fa fa-shopping-cart fa-2x mb-2 text-primary"></i>
                                                <h5 class="card-title">Total Penjualan</h5>
                                                <p class="card-text">
                                                    <strong
                                                        style="font-size: 20px">{{ number_format($total_penjualan, 0, ',', '.') }}</strong>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card text-center">
                                            <div class="card-body">
                                                <i class="fa fa-shopping-bag fa-2x mb-2 text-success"></i>
                                                <h5 class="card-title">Total Pembelian</h5>
                                                <p class="card-text">
                                                    <strong
                                                        style="font-size: 20px">{{ number_format($total_pembelian, 0, ',', '.') }}</strong>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card text-center">
                                            <div class="card-body">
                                                <i class="fa fa-money-bill-wave fa-2x mb-2 text-warning"></i>
                                                <h5 class="card-title">Total Keuntungan</h5>
                                                <p class="card-text">
                                                    <strong
                                                        style="font-size: 20px">{{ number_format($total_penjualan - $total_pembelian, 0, ',', '.') }}</strong>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </section>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
@endpush
