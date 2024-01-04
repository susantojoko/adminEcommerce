@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <h1>Daftar Transaksi</h1>
    <br></br>
    <a href="transaksi/print"><button class="btn btn-primary">print</button></a>
    <br></br>
    <table class="table" id="data-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomer Transaksi</th>
                <th>Produk</th>
                <th>User</th>
                <th>Jumlah Produk</th>
                <th>Harga Produk</th>
                <th>Total Produk</th>
                <th>Tanggal Transaksi</th>
                <th>Status Transaksi</th>
                <th>aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $index => $transaction)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $transaction->nomer_transaksi }}</td>
                    <td>
                    @if ($transaction->product)
                            {{ $transaction->product->name }}
                        @else
                            Nama Kategori Tidak Tersedia
                        @endif
                    </td>
                    <td>
                    @if ( $transaction->user)
                            {{ $transaction->user->name }}
                        @else
                            Nama Kategori Tidak Tersedia
                        @endif
                    </td>
                    <td>{{ $transaction->jumlah_produk }}</td>
                    <td>{{ $transaction->harga_produk }}</td>
                    <td>{{ $transaction->total_produk }}</td>
                    <td>{{ $transaction->tanggal_transaksi }}</td>
                    <td>{{ $transaction->status_transaksi }}</td>
                    <td>
                        <button class="fas fa-trash-alt fa-xs btn btn-danger" data-route="{{ route('transactions.destroy', $transaction->id_transaksi) }}" onclick="openConfirmationModal(this)"> Delete</button>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
