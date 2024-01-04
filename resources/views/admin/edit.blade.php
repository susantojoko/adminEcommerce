@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <h1>Edit Admin</h1>
    <form method="POST" action="{{ route('admin.update', $admin->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama Admin:</label>
            <input type="text" name="name" class="form-control" value="{{ $admin->name }}">
        </div>
        <div class="form-group">
            <label for="email">Nama Admin:</label>
            <input type="text" name="email" class="form-control" value="{{ $admin->email }}">
        </div>

        <div class="form-group">
            <label for="role">Status Admin:</label>
            <select name="role" class="form-control">
                <option value="2" {{ $admin->role === 2 ? 'selected' : '' }}>Admin</option>
                <option value="1" {{ $admin->role === 1 ? 'selected' : '' }}>Customer</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary" id="savealert">Simpan</button>
    </form>
</div>
@endsection
