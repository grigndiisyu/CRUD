@extends('layouts.template')

@section('content')
    @if (Session::get('success'))
        <div class="alert alert-success"> {{ Session::get('success') }} </div>
    @endif

    @if (Session::get('delete'))
        <div class="alert alert-danger"> {{ Session::get('delete') }} </div>
    @endif

    @if (Session::get('edit'))
        <div class="alert alert-warning">{{ Session::get('edit') }}</div>
    @endif

    <div class="d-flex justify-content-end">
    <a href="{{ route('user.create') }}" class="btn btn-secondary m-3">Tambah Akun</a>
    </div>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <td>No</td>
                <td>Nama</td>
                <td>Email</td>
                <td class="text-center">Aksi</td>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($users as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['email'] }}</td>
                    <td class="d-flex justify-content-center">
                        <a href="{{ route('user.edit', $item['id']) }}" class="btn btn-primary me-3" style="width: 70px; height: 38px;">Edit</a>
                        <form action="{{ route('user.delete', $item['id']) }}" method="POST">
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