@extends('layouts.template')

@section('content')
    @if (Session::get('edit'))
        <div class="alert alert-warning">{{ Session::get('edit') }}</div>
    @endif
    @if (Session::get('delete'))
        <div class="alert alert-danger">{{ Session::get('delete') }}</div>
    @endif

    <table class="table table-striped table-boardered table-hover">
        <thead>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Quantity</th>
            <th>Unit</th>
            <th>Action</th>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($barangs as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['harga'] }}</td>
                    <td>{{ $item['qty'] }}</td>
                    <td>{{ $item['unit'] }}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('barang.edit', $item['id']) }}" class="btn btn-primary me-3">Edit</a>
                        <form action="{{ route('barang.delete', $item['id']) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection