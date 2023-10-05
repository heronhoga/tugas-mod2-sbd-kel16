@extends('admin.layout')
@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title fw-bolder mb-3">Tambah Penjual</h5>
        <form method="post" action="{{route('admin.storeseller')}}">
            @csrf

            <div class="mb-3">
                <label for="nama_penjual" class="form-label">Nama penjual</label>
                <input type="text" class="form-control" id="nama_admin" name="nama_penjual">
            </div>

            <div id="date-picker-example" class="mb-3" inline="true">
                <label for="dates">Tanggal lahir</label>
                <input placeholder="Select date" type="date" id="dates" class="form-control" name="tanggal_lahir"
                onchange="formatDate()">
            </div>

            <div id="date-picker-example" class="mb-3" inline="true">
                <label for="dates">Tanggal masuk</label>
                <input placeholder="Select date" type="date" id="dates" class="form-control" name="tanggal_masuk"
                onchange="formatDate()">
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat">
            </div>

            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Tambah" />
            </div>
        </form>
    </div>
</div>
@stop
