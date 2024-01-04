<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index()
    {
        $products = Product::all();

        // Mengirim data produk ke tampilan untuk ditampilkan
        
        return view('modulproduk.produk', compact('products'));
    }

    public function create()
    {
        return view('modulproduk.tambah');
    }

    public function store(Request $request)
{
    // Validasi data yang diterima dari formulir
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'brand' => 'required|string|max:255',
        'stok' => 'required|integer',
        'price' => 'required|numeric',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        'description' => 'nullable|string', // Deskripsi opsional
    ]);

    // Handle gambar produk
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = "http://192.168.2.28:8000/images/" . time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images'), $imageName);
        $validatedData['image'] = $imageName;
    }

    // Simpan produk baru ke dalam database
    Product::create($validatedData);

    // Kembalikan pengguna ke halaman daftar produk
    return redirect()->route('products.index')->with('successtmb', 'Produk berhasil diitambah.');
}



    public function show(Product $product)
    {
        return view('modulproduk.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('modulproduk.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
{
    // dd($request->all());
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'brand' => 'required|string|max:255',
        'stok' => 'required|integer',
        'price' => 'required|numeric',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        'description' => 'nullable|string', // Deskripsi opsional
    ]);

    if ($request->hasFile('new_image')) {
    // Proses gambar baru
    $image = $request->file('new_image');
    $imageName = "http://192.168.2.28:8000/images/" . time() . '_' . $image->getClientOriginalName();
    $image->move(public_path('images'), $imageName);
    $validatedData['image'] = $imageName;
}

// Simpan produk dengan gambar yang baru atau gambar yang ada jika tidak ada gambar baru
$product->update($validatedData);
return redirect()->route('products.index')->with('successup', 'Produk berhasil diupdate.');

}


    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('successdel', 'Produk berhasil dihapus.');
    }
    
    
}
