@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <h1>Daftar Rating Produk</h1>
    <break>
    <table class="table" id="data-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Produk</th>
                <th>Nama User</th>
                <th>Rating</th>
                <th>Komentar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ratings as $index => $rating)
                <tr>
                    <td>{{ $index+ 1 }}</td>
                    <td>
                    @if ($rating->product)
                            {{ $rating->product->name }}
                        @else
                            Produk tidak ditemukan
                        @endif
                    </td>
                    <td>
                    @if ($rating->user)
                            {{ $rating->user->name }}
                        @else
                            Pengguna tidak ditemukan
                        @endif
                    </td>
                    
                    <td>{{ $rating->rating }}</td>
                    <td>{{ $rating->komentar }}</td>
                    <td>
                        <a href="{{ route('ratings.edit', $rating->id_rating) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('ratings.destroy', $rating->id_rating) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
