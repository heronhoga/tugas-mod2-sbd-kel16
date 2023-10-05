@extends('admin.layout')

@section('content')

<h4 class="mt-5">Data Toko Ponsel</h4>

<a href="{{ route('admin.create') }}" type="button" class="btn btn-success rounded-3">Tambah Data</a>

<a href="{{ route('admin.indexseller') }}" type="button" class="btn btn-success rounded-3">Tabel Penjual</a>


@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif




<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>ID PENJUAL</th>
            <th>NAMA PENJUAL</th>
            <th>TANGGAL MASUK</th>
            <th>MEREK PONSEL</th>
            <th>HARGA PONSEL</th>
            <th>SISTEM OPERASI PONSEL</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->id_penjual }}</td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->tanggal_masuk }}</td>
            <td>{{ $data->merek }}</td>
            <td>{{ $data->harga }}</td>
            <td>{{ $data->sistem_operasi }}</td>
            <td>
                <a href="{{ route('admin.edit', $data->id_produk) }}" type="button"
                    class="btn btn-warning rounded-3">Ubah</a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#hapusModal{{ $data->id_produk }}">
                    Hapus
                </button>

                <!-- Modal -->
                <div class="modal fade" id="hapusModal{{ $data->id_produk }}" tabindex="-1"
                    aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('admin.delete', $data->id_produk) }}">
                                @csrf
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus data ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Ya</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop
