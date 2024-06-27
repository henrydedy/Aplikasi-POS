<!-- Modal -->
<div class="modal fade" id="form-tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success" id="exampleModalLabel">Tambah Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/{{ auth()->user()->level }}/barang/store" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="
                            form-group">
                                <label for="kode">Kode</label>
                                <input type="text" class="form-control" value="{{ $kode }}" name="kode"
                                    id="kode">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" name="nama">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="harga_beli">Harga Beli</label>
                                <input type="text" class="form-control jumlah" id="harga-beli" name="harga_beli">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="harga_jual">Harga Jual</label>
                                <input type="text" class="form-control jumlah" id="harga-jual" name="harga_jual">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="number" class="form-control jumlah" name="stok">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kategori">Kategori</label>
                                <select class="custom-select" name="kategori_id" id="kategori">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($kategori as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="satuan">Satuan</label>
                                <select class="custom-select" name="satuan_id" id="satuan">
                                    <option value="">Pilih Satuan</option>
                                    @foreach ($satuan as $satuan)
                                        <option value="{{ $satuan->id }}">{{ $satuan->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="supplier">Supplier</label>
                                <select class="custom-select" name="supplier_id" id="supplier">
                                    <option value="">Pilih Supplier</option>
                                    @foreach ($supplier as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="diskon">Diskon</label>
                                <div class="input-group-prepend">
                                    <input type="text" class="form-control jumlah" name="diskon" id="diskon"
                                        value="0" required>
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                    <!-- Tambahkan button submit -->
                    <button type="submit" class="btn btn-outline-primary float-right">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        $(document).ready(function() {
            $('#kategori, #satuan, #supplier').change(function() {
                // Fungsi ini akan dijalankan setiap kali pilihan dalam dropdown berubah
                var allFilled = $('#kategori').val() && $('#satuan').val() && $('#supplier').val();
                if (allFilled) {
                    // Jika semua dropdown terisi, fokus akan dipindahkan ke field input berikutnya
                    $(this).closest('.form-group').next('.form-group').find('input, select').first()
                        .focus();
                }
            });

            $('#form-tambah input').keydown(function(event) {
                if (event.keyCode == 13) {
                    event.preventDefault();
                    var inputs = $(this).closest('form').find(':input:visible');
                    inputs.eq(inputs.index(this) + 1).focus();
                }
            });
        });
    </script>
@endpush
