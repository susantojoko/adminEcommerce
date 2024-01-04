@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <h1>Edit Produk</h1>
    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama Produk:</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}">
        </div>

        <div class="form-group">
            <label for="stok">Stok:</label>
            <input type="number" name="stok" class="form-control" value="{{ $product->stok }}">
        </div>

        <div class "form-group">
            <label for="price">Harga:</label>
            <input type="number" name="price" class="form-control" value="{{ $product->price }}">
        </div>

        <div class="form-group">
            <label for="image">Gambar Produk saat ini:</label>
            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" style="max-width: 200px;">
        </div>

        <div class="form-group">
            <label for="new_image">Unggah Gambar Baru (opsional):</label>
            <input type="file" name="new_image" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Deskripsi Produk:</label>
            <textarea name="description" class="form-control">{{ $product->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
