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
        <h5 class="card-title fw-bolder mb-3">Tambah ponsel</h5>
        <form method="post" action="{{route('admin.store')}}">
            @csrf

            <div class="mb-3">
                <label for="merek" class="form-label">Merek ponsel</label>
                <input type="text" class="form-control" id="merek" name="merek">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="text" class="form-control" id="harga" name="harga">
            </div>
            <div class="mb-3">
                <label for="sistemoperasi" class="form-label">Sistem Operasi</label>
                <input type="text" class="form-control" id="sistem_operasi" name="sistem_operasi">
            </div>
            <div class="mb-3">
                <label for="Penjual" class="form-label">Penjual</label>
                <select class="form-select" aria-label="Default select example" name="id_penjual">
                @foreach ($datas as $data)
                <option value="{{$data->id_penjual}}">{{$data->name}}</option>
                @endforeach
                </select>
            </div>
            
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Tambah" />
            </div>
        </form>
    </div>
</div>
@stop
