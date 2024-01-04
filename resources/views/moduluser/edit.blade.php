<!-- resources/views/users/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <h1>Edit Pengguna</h1>
    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT') <!-- Gunakan metode PUT untuk mengirimkan pembaruan -->

        <div class="form-group">
            <label for="name">Nama Pengguna:</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
        </div>

        <div class="form-group">
            <label for="password">Kata Sandi Baru (opsional):</label>
            <input type="password" name="password" class="form-control">
        </div>

        <!-- Anda dapat menyertakan bidang-bidang khusus pengguna lainnya sesuai kebutuhan -->

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
