@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <h1>Daftar Kategori</h1>
    <a href="{{ route('categories.add') }}" class="btn btn-primary mb-2">Tambah Data Kategori</a>
    <table class="table" id="data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Gambar</th>
                <th>Slug</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $index => $category)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $category->nama_kategori }}</td>
                    <td><img src="{{ asset('images/' . $category->image) }}" alt="{{ $category->nama_kategori }}" style="max-width: 50; max-height: 50px;"></td>
                    <td>{{ $category->slug }}</td>
                    <td>{{ $category->status == 1 ? 'Active' : 'Block' }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id_kategori) }}" class="fas fa-edit fa-xs btn btn-primary"> Edit</a>
                        <button class="fas fa-trash-alt fa-xs btn btn-danger" data-route="{{ route('categories.destroy', $category->id_kategori) }}" 
                        onclick="openConfirmationModal(this)" data-name="{{ $category->nama_kategori }}"> Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
