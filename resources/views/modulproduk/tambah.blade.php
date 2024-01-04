@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <h1>Tambah Produk Baru</h1>
    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nama Produk:</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="form-group">
            <label for="brand">Nama Brand:</label>
            <input type="text" name="brand" class="form-control">
        </div>

        <div class="form-group">
            <label for="stok">Stok:</label>
            <input type="number" name="stok" class="form-control">
        </div>

        <div class="form-group">
            <label for="price">Harga:</label>
            <input type="number" name="price" class="form-control">
        </div>

        <div class="form-group">
            <label for="image">Gambar Produk:</label>
            <input type="file" name="image" class="form-control">
        </div>

        <div class="form-group">
            <label for="description">Deskripsi Produk:</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary" id="addalert">Simpan</button>
    </form>
    
</div>
@endsection
