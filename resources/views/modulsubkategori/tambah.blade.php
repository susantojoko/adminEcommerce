@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <h1>Tambah Subkategori Baru</h1>
    <form method="POST" id="subcategoryForm" action="{{ route('subcategories.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="id_kategori">Kategori:</label>
            <select name="id_kategori" class="form-control">
                @foreach ($categories as $category)
                    <option value="{{ $category->id_kategori }}">{{ $category->nama_kategori }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="name">Nama Subkategori:</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        
        <div class="form-group">
            <label for="slug">Slug:</label>
            <input type="text" name="slug" id="slug" class="form-control" readonly>
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
<script>
$("#name").on('input', function() {
    var name = $(this).val();
    var slug = name.toLowerCase().replace(/ /g, '-');
    $("#slug").val(slug);
});

$("#subcategoryForm").submit(function(event) {
    // event.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: '{{ route("subcategories.store") }}',
        type: 'post',
        data: formData,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function(response) {
            // Handle the success response here
        },
        error: function(jqXHR, exception) {
            console.log("Something went wrong");
        }
    });
});
</script>
@endsection
