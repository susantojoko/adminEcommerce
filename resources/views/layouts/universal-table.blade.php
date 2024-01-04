@props(['data', 'headers'])
<table class="table" id="data-table">
    <thead>
        <tr>
            @foreach ($headers as $header)
                <th>{{ $header }}</th>
            @endforeach
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                @foreach ($headers as $header)
                    <td>{{ $item->$header }}</td>
                @endforeach
                <td>
                    <a href="{{ route('editRoute', $item->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('deleteRoute', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
