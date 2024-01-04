@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <center><h3>Daftar Produk</h3></center>
    <!-- SEARCH FORM -->
    <a href="{{ route('products.add') }}" class="btn btn-primary">Tambah Data Produk</a>
    <div class="tabel-data">
        <table class="table" id="data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Brand</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $index => $product)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td><img src="{{ $product->image}}" alt="{{ $product->name }}" style="max-width: 100px; max-height: 100px;"></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->brand }}</td>
                        <td>{{ $product->stok }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            <a href="{{ route('products.edit', $product->id) }}" class="fas fa-edit fa-xs btn btn-primary mb-2"> Edit</a>
                            <button class="fas fa-trash-alt fa-xs btn btn-danger" data-route="{{ route('products.destroy', $product->id) }}" onclick="openConfirmationModal(this)"> Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
