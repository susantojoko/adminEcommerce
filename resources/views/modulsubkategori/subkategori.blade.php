@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <h1>Daftar Subkategori</h1>
    <a href="{{route('subcategories.add')}}" class="btn btn-primary mb-2">Tambah Data Subkategori</a>
    <table class="table" id="data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Subkategori</th>
                <th>Nama Kategori</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subcategories as $index => $subcategory)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $subcategory->name }}</td>
                    <td>
                    @if ($subcategory->category)
                            {{ $subcategory->category->nama_kategori }}
                        @else
                            Nama Kategori Tidak Tersedia
                        @endif
                    </td>
                    <td>{{ $subcategory->status == 1 ? 'Active' : 'Block' }}</td>
                    <td>
                        <a href="{{ route('subcategories.edit', $subcategory->id) }}" class="fas fa-edit fa-xs btn btn-primary"> Edit</a>
                        <button class="fas fa-trash-alt fa-xs btn btn-danger" data-route="{{ route('subcategories.destroy', $subcategory->id) }}" onclick="openConfirmationModal(this)"> Delete</button>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
