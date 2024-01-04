@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <h1>Tambah Admin Baru</h1>
    <form method="POST" action="{{ route('admin.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Nama Admin:</label>
            <input type="text" name="name" class="form-control">
        </div>
       
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" name="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="form-group">
            <label for="role">Status Admin:</label>
            <select name="role" class="form-control">
                <option value="2">admins</option>
                <option value="1">customers</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary" id="addalert">Simpan</button>
    </form>
</div>
@endsection
