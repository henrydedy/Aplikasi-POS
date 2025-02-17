<!-- Modal -->

<div class="modal fade" id="data-barang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog custom-modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-info" id="exampleModalLabel">Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div style="overflow-y: scroll; max-height: 400px;">
                            <table class="table table-hover" id="table" data-page-length="500">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Barcode</th>
                                        <th>Nama</th>
                                        <th>Supplier</th>
                                        <!-- <th>Harga_beli</th> -->
                                        <th>Harga</th>
                                        <th></th>
                                        <th>Stok</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang as $item)
                                        <tr>
                                            <form action="/{{ auth()->user()->level }}/penjualan/store" method="POST">
                                                @csrf
                                                <td>{{ $loop->iteration }}<input class="form-control" type="text"
                                                        value="{{ $nomor }}" name="kode_transaksi" hidden>
                                                </td>
                                                <td style="width: 12%">{{ $item->kode }}<input class="form-control"
                                                        type="text" value="{{ $item->id }}" name="barang_id"
                                                        hidden></td>
                                                <td style="width: 50%">{{ $item->nama }}<input class="form-control"
                                                        type="text" value="{{ $item->id }}" name="barang_id"
                                                        hidden></td>
                                                <td>{{ $item->supplier->nama }}<input class="form-control"
                                                        type="text" value="{{ $item->nama }}" name="supplier_id"
                                                        hidden></td>
                                                <td>{{ $item->formatRupiah('harga_jual') }}<input class="form-control"
                                                        type="text" value="{{ $item->harga_jual }}" name="harga"
                                                        hidden></td>
                                                <td style="width: 8%"><input class="form-control jumlah" type="number"
                                                        name="jumlah" id="jumlah" value="1" min="1"
                                                        max="{{ $item->stok }}" style="display: none;"></td>
                                                @if ($item->stok > 0)
                                                    <td>{{ $item->stok }}<input type="text"
                                                            value="{{ $item->stok }}" hidden><input
                                                            class="form-control" type="text" value="1" hidden>
                                                    </td>
                                                @endif
                                                @if ($item->stok <= 0)
                                                    <td><span class="text-danger">Stok Habis</span></td>
                                                @endif
                                                @if ($item->stok <= 0)
                                                    <td><button type="submit" id="tambah"
                                                            class="btn btn-sm btn-success" disabled><i
                                                                class="fa fa-plus"></i></button></td>
                                                @endif
                                                @if ($item->stok > 0)
                                                    <td><button type="submit" id="tambah"
                                                            class="btn btn-sm btn-success"><i
                                                                class="fa fa-plus"></i></button></td>
                                                @endif
                                                <td>
                                                    <input class="form-control" type="text"
                                                        value="{{ $item->harga_beli }}" name="harga_beli" hidden>
                                                </td>
                                            </form>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .custom-modal-xl {
        max-width: 80%;
        width: 80%;
        height: 80%;
        margin: center;
    }
</style>
