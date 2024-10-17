@extends('layouts.template')

@section('content')
    @if (Session::get('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif

    <form action="{{ route('barang.store') }}" method="POST" class="card p-3">
        @csrf

        <div class="mb-3 row">
            <label for="name" class="col sm-2 col-form-label">Nama Barang : </label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="harga" class="col sm-2 col-form-label">Harga Barang : </label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="harga" name="harga">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="qty" class="col sm-2 col-form-label">Quantity : </label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="qty" name="qty">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="unit" class="col-sm-2 col-from-label">Unit :</label>
            <div class="col-sm-10">
                <select name="unit" id="unit" class="form-select">
                    <option selected disabled hidden>Pilih</option>
                    <option value="makanan">Makanan</option>
                    <option value="minuman">Minuman</option>
                    <option value="mentahan">Mentahan</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-4">Tambah Data Barang</button>
    </form>
@endsection