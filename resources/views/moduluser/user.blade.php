<!-- resources/views/users/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <h1>Daftar Pengguna</h1>
    <a href="{{ route('users.add') }}" class="btn btn-primary">Tambah Pengguna</a>
    <table class="table" id="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <!-- Other user-specific fields -->
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <!-- Display other user-specific fields -->
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" id="delete">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
