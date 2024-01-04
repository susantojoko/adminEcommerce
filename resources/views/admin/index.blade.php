<!-- resources/views/admin/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <h1>Daftar Admin</h1>
    <a href="{{ route('admin.create') }}" class="btn btn-primary">Tambah Admin</a>
    <table class="table" id="data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Admin</th>
                <th>email</th>
                <th>role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($admins as $index => $admin)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->role }}</td>
                    <td>
                        <a href="{{ route('admin.edit', $admin->id) }}" class="fas fa-edit fa-xs btn btn-primary"> Edit</a>
                        <button class="fas fa-trash-alt fa-xs btn btn-danger" data-id="{{ $admin->id }}" onclick="openConfirmationModal({{ $admin->id }})"> Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
