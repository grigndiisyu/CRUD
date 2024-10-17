@extends('layouts.template')

@section('content')
@if ($barang)
    <form action="{{ route('barang.update', $barang['id']) }}" method="POST" class="card p-5">
        @csrf
        @method('PATCH')

        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Nama Barang :</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ $barang['name'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="harga" class="col-sm-2 col-form-label">Harga :</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="harga" name="harga" value="{{ $barang['harga'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="qty" class="col-sm-2 col-form-label">Quantity :</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="qty" name="qty" value="{{ $barang['qty'] }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="unit" class="col-sm-2 col-form-label">Unit</label>
            <div class="col-sm-10">
                <select name="unit" id="unit" class="form-select">
                    <option disabled selected hidden>Pilih</option>
                    <option value="makanan" {{ $barang['unit'] == 'makanan' ? 'selected' : '' }}>Makanan</option>
                    <option value="minuman" {{ $barang['unit'] == 'minuman' ? 'selected' : '' }}>Minuman</option>
                    <option value="mentahan" {{ $barang['unit'] == 'mentahan' ? 'selected' : '' }}>Mentahan</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Ubah Data</button>
    </form>
@else
<p>Barang Not Found.</p>
@endif
@endsection