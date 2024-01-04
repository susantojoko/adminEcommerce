@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <h1>Edit Kategori</h1>
    <form method="POST" action="{{ route('categories.update', $category->id_kategori) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_kategori">Nama Kategori:</label>
            <input type="text" name="nama_kategori" id="nama_kategori"class="form-control" value="{{ $category->nama_kategori }}">
        </div>
       
        <div class="form-group">
            <label for="slug">Slug:</label>
            <input type="text" name="slug" id="slug" class="form-control" value="{{ $category->slug }}">
        </div>

        <div class="form-group">
            <label for="image">Gambar saat ini:</label>
            <br/><img src="{{ asset('images/' . $category->image) }}" alt="{{ $category->name }}" style="max-width: 100px;">
        </div>

        <div class="form-group">
            <label for="new_image">Unggah Gambar Baru (opsional):</label>
            <input type="file" name="new_image" class="form-control">
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" class="form-control">
                <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary" id="savealert">Simpan</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@12"></script>
<script>
$("#nama_kategori").on('input', function() {
    var nama_kategori = $(this).val();
    var slug = nama_kategori.toLowerCase().replace(/ /g, '-');
    console.log(slug);
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
</script> 
@endsection
