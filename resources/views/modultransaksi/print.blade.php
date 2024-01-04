<!DOCTYPE html>
<html>
<head>
    <title>Daftar Transaksi</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Daftar Transaksi</h1>
    <table>
        <thead>
            <tr>
                <th>ID Transaksi</th>
                <th>Nomer Transaksi</th>
                <th>Nama Produk</th>
                <th>Nama User</th>
                <th>Jumlah Produk</th>
                <th>Harga Produk</th>
                <th>Total Produk</th>
                <th>Tanggal Transaksi</th>
                <th>Status Transaksi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id_transaksi }}</td>
                    <td>{{ $transaction->nomer_transaksi }}</td>
                    <td>
                    @if ($transaction->product)
                            {{ $transaction->product->name }}
                        @else
                            Nama Produk Tidak Tersedia
                        @endif
                    </td>
                    <td>
                    @if ($transaction->user)
                            {{ $transaction->user->name }}
                        @else
                            Nama User Tidak Tersedia
                        @endif
                    </td>
                    <td>{{ $transaction->jumlah_produk }}</td>
                    <td>{{ $transaction->harga_produk }}</td>
                    <td>{{ $transaction->total_produk }}</td>
                    <td>{{ $transaction->tanggal_transaksi }}</td>
                    <td>{{ $transaction->status_transaksi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <button onclick="window.print()">Print</button>
</body>
</html>
