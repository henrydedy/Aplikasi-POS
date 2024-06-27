<!-- Modal -->
<div class="modal fade" id="form-tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success" id="exampleModalLabel">Tambah Data Supplier Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/{{ auth()->user()->level }}/supplier/store" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="kode_supplier">Kode Supplier</label>
                        <input type="text" class="form-control" name="kode_supplier">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="nohp">No Handphone</label>
                        <input type="text" class="form-control" name="nohp">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan">
                    </div>
                    <button type="submit" class="btn btn-outline-primary float-right">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
