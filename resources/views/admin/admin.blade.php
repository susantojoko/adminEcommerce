<!-- resources/views/admin/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <h1>Daftar Admin</h1>
    <a href="{{ route('admin.create') }}" class="btn btn-primary">Tambah Admin</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Admin</th>
                <th>Jenis Kelamin</th>
                <th>Telepon</th>
                <th>Alamat Admin</th>
                <th>Status Admin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $admin)
                <tr>
                    <td>{{ $admin->id_admin }}</td>
                    <td>{{ $admin->nama_admin }}</td>
                    <td>{{ $admin->jenis_kelamin }}</td>
                    <td>{{ $admin->telepon }}</td>
                    <td>{{ $admin->alamat_admin }}</td>
                    <td>{{ $admin->status_admin }}</td>
                    <td>
                        <a href="{{ route('admin.edit', $admin->id_admin) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('admin.destroy', $admin->id_admin) }}" method="POST">
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
