@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <h1>Edit Subkategori</h1>
    <form method="POST" action="{{ route('subcategories.update', $subcategory->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama Subkategori:</label>
            <input type="text" name="name" class="form-control" value="{{ $subcategory->name }}">
        </div>

        <div class="form-group">
            <label for="nama_kategori">nama_kategori:</label>
            <input type="text" name="nama_kategori" class="form-control" value="{{ $subcategory->category->nama_kategori }}" readonly>
        </div>
        
        <div class="form-group">
            <label for="slug">Slug:</label>
            <input type="text" name="slug" class="form-control" value="{{ $subcategory->slug }}" readonly>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" class="form-control">
                <option value="1" {{ $subcategory->status == 1 ? 'selected' : '' }}>Aktif</option>
                <option value="0" {{ $subcategory->status == 0 ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary" id="savealert">Simpan</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$("#nama_subkategori").on('input', function() {
    var nama_subkategori = $(this).val();
    var slug = nama_subkategori.toLowerCase().replace(/ /g, '-');
    $("#slug").val(slug);
});
</script>
@endsection
