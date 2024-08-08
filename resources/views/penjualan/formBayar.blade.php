<!-- formbayar.blade.php -->
<div class="modal fade" id="form-bayar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-info" id="exampleModalLabel">Transaksi Pembayaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form action="/{{ auth()->user()->level }}/penjualan/bayar/{{ $nomor }}" method="POST"
                            id="form-penjualan">
                            @csrf
                            <select class="custom-select" name="kode_kasir" hidden>
                                <option value="{{ auth()->user()->kode }}">
                                    {{ auth()->user()->nama }}
                                </option>
                            </select>
                            <input type="text" id="kode-transaksi" class="form-control" value="{{ $nomor }}"
                                name="kode_transaksi" readonly hidden>

                            <!-- Tambahkan id untuk total_beli -->
                            <input type="text" id="total-beli" class="form-control" value="0" name="total_beli"
                                hidden>
                            <input type="text" id="total-beli" class="form-control" value="{{ $total_beli }}"
                                name="total_beli" hidden>


                            <div class="form-group">
                                <label for="Total Belanja">Subtotal</label>
                                <div class="input-group-prepend">
                                    <h1 class="text-info mr-2">Rp<br></h1>
                                    <input class="d-none" type="text" id="total-bayar" value="0" name="total">
                                    <h1 class="text-info" id="label-total-bayar">0</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="bayar">Bayar</label>
                                        <input type="text" id="bayar" class="form-control jumlah" name="bayar"
                                            required autofocus>
                                        <div id="warning-message" style="color: red; display: none;">
                                            jumlah bayar kurang dari subtotal!
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col-md-3">
                                            <button type="button" class="btn btn-info"
                                                onclick="setDibayarkan(10000)">10.000</button>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="button" class="btn btn-info"
                                                onclick="setDibayarkan(20000)">20.000</button>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="button" class="btn btn-info"
                                                onclick="setDibayarkan(50000)">50.000</button>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="button" class="btn btn-info"
                                                onclick="setDibayarkan(100000)">100.000</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="kembali">Kembali</label>
                                        <input type="text" id="kembali" class="form-control" value="0"
                                            readonly>
                                        <input type="text" id="kembalian" class="form-control" value="0"
                                            name="kembali" hidden>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn m-1 btn-outline-primary float-right"
                                data-toggle="modal" onclick="simpan()">Bayar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan script ini di bawah atau di bagian mana pun sesuai kebutuhan -->
<script>
    // Fungsi untuk mengupdate nilai total beli
    function updateTotalBeli() {
        var totalBeli = document.getElementById('total-beli').value;
        var labelTotalBayar = document.getElementById('label-total-bayar');

        // Ubah format nilai total beli ke dalam format Rupiah
        labelTotalBayar.textContent = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        }).format(totalBeli);
    }

    // Panggil fungsi ketika modal dibuka
    $('#form-bayar').on('shown.bs.modal', function() {
        updateTotalBeli();
    });
</script>
