<!-- resources/views/users/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <h1>Tambah Pengguna Baru</h1>
    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Nama Pengguna:</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Kata Sandi:</label>
            <input type="password" name="password" class="form-control">
        </div>

        <!-- You may include other user-specific fields as needed -->

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
