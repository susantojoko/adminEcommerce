<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction; 

class TransactionController extends Controller
{
    public function show() {
        $transactions = Transaction::all();
        return view('modultransaksi.print', compact('transactions'));
    }
    public function index()
    {
        // Ambil data transaksi dari model Transaction
        $transactions = Transaction::with('user','product')->get();

        return view('modultransaksi.transaksi', ['transactions' => $transactions]);
    }

    public function create()
    {
        // Tampilkan formulir tambah transaksi
        return view('transactions.create');
    }

    public function store(Request $request)
    {
        // Validasi input dari formulir
        $validatedData = $request->validate([
            'nomer_transaksi' => 'required',
            'id_user' => 'required',
            'id_produk' => 'required',
            'jumlah_produk' => 'required',
            'harga_produk' => 'required',
            'total_produk' => 'required',
            'tanggal_transaksi' => 'required',
            'status_transaksi' => 'required',
        ]);

        // Simpan data transaksi ke dalam database
        Transaction::create($validatedData);

        // Redirect ke halaman indeks transaksi
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    // Implementasikan metode lain sesuai kebutuhan Anda
}
