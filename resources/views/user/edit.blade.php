@extends('layouts.template')

@section('content')
    <form action="{{ route('user.update', $user['id']) }}" method="POST">
        @csrf
        @method('PATCH')

        @if (Session::get('failed'))
            <div class="alert alert-danger">{{ Session::get('failed') }}</div>
        @endif
        
        @if (Session::get('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        
        <div class="form-group">
            <label for="name" class="form-label">Nama Pengguna: </label>
            <input type="text" name="name" id="name" value="{{ old('name', $user['name']) }}" class="form-control">
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Email:</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user['email']) }}" class="form-control">
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Password :</label>
            <input type="password" name="password" id="password" class="form-control" value="{{ old('password', $user['password']) }}" minlength="8">
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <small class="form-text text-muted">Password minimal 8 karakter.</small>
        </div>

        <a href="{{ route('user.index') }}" class="btn btn-secondary mt-3">Close</a>
        <button type="submit" class="btn btn-primary mt-3">Confirm</button>
    </form>
@endsection