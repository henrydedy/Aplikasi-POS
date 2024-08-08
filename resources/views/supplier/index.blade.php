@extends('layout.app')

@section('title', ' - Supplier Barang')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Supplier Barang</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header bg-white">
                            <h4 class="text-primary">Data Supplier</h4>
                            <div class="card-header-form float-right">
                                <button type="button" class="btn btn-sm btn-outline-success" data-toggle="modal"
                                    data-target="#form-tambah"><i class="fa fa-plus"></i> Tambah</button>
                            </div>
                        </div>
                        <div class="card-body p-2">
                            <div class="table-responsive">
                                <table class="table table-hover" id="table">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Alamat</th>
                                            <th style="width: 20%">Nama</th>
                                            <th>NoHP</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($supplier as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->alamat }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->nohp }}</td>
                                                <td>{{ $item->keterangan }}</td>
                                                <td>
                                                    <form action="/{{ auth()->user()->level }}/supplier/{{ $item->id }}"
                                                        id="delete-form">
                                                        <a href="/{{ auth()->user()->level }}/supplier/{{ $item->id }}/edit"
                                                            class="btn btn-sm btn-outline-warning"><i
                                                                class="fa fa-edit"></i>
                                                            Edit</a>
                                                        @csrf
                                                        @method('delete')
                                                        <button type="button" class="btn btn-sm btn-outline-danger"
                                                            id="{{ $item->alamat }}"id="{{ $item->nama }}"
                                                            id="{{ $item->nohp }}" id="{{ $item->keterangan }}"
                                                            data-id="{{ $item->id }}" onclick="confirmDelete(this)"><i
                                                                class="fa fa-trash"></i> Delete</button>
                                                    </form>
                                                </td>
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
    </section>
    @include('supplier.form')
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });

        var data_anggota = $(this).attr('data-id')

        function confirmDelete(button) {

            event.preventDefault()
            const id = button.getAttribute('data-id');
            const kode = button.getAttribute('id');
            swal({
                    title: 'Apa Anda Yakin ?',
                    text: 'Anda akan menghapus data: "' + kode +
                        '". Ketika Anda tekan OK, maka data tidak dapat dikembalikan !',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        const form = document.getElementById('delete-form');
                        // Setelah pengguna mengkonfirmasi penghapusan, Anda bisa mengirim form ke server
                        form.action = '/{{ auth()->user()->level }}/supplier/' +
                            id; // Ubah aksi form sesuai dengan ID yang sesuai
                        form.submit();
                    }
                });
        }
    </script>
@endpush
