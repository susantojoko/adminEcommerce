@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <h1>Tambah Kategori Baru</h1>
    <form method="POST" id="categoryForm" action="{{ route('categories.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama_kategori">Nama Kategori:</label>
            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="slug">Slug:</label>
            <input type="text" name="slug" id="slug" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label for="image">Gambar Produk:</label>
            <input type="file" name="image" id="image" class="form-control">
            <img id="preview" src="#" alt="Preview Image" style="max-width: 200px; display: none;">
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" class="form-control">
                <option value="1">Active</option>
                <option value="0">Block</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary" id="addalert">Simpan</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@12"></script>
<script>
$("#nama_kategori").on('input', function() {
    var nama_kategori = $(this).val();
    var slug = nama_kategori.toLowerCase().replace(/ /g, '-');
    $("#slug").val(slug);
});

$("#image").on('change', function() {
    var input = this;
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#preview").attr('src', e.target.result).show();
        };
        reader.readAsDataURL(input.files[0]);
    }
});

document.getElementById("addalert").addEventListener("click", function(event) {
    event.preventDefault();
    if (validateForm()) {
        // Lanjutkan pengiriman form jika semua data telah diisi
        document.getElementById("categoryForm").submit();
    }
});
</script>
@endsection
