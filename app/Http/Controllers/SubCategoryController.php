<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Models\Category; 

class SubCategoryController extends Controller {

    public function index()
    {

        $subcategories = SubCategory::with('category')->get();
        return view('modulsubkategori.subkategori', compact('subcategories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('modulsubkategori.tambah', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validasi input dari formulir
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'status' => 'required|boolean',
            'id_kategori'=> 'required|integer',
        ]);

        // Proses penyimpanan subkategori ke database
        SubCategory::create($validatedData);

        return redirect()->route('subcategories.index')->with('success', 'Subkategori berhasil ditambahkan.');
    }

    public function show(Subcategory $subcategory)
    {
        return view('modulsubkategori.show_subkategori', compact('subcategory'));
    }

    public function edit(Subcategory $subcategory)
    {
        return view('modulsubkategori.edit', compact('subcategory'));
    }

    public function update(Request $request, Subcategory $subcategory)
    {
        // Validasi input dari formulir
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'id_kategori'=> 'required|integer',
            'slug' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        // Proses pembaruan subkategori
        $subcategory->update($validatedData);
        return redirect()->route('subcategories.index')->with('success', 'Subkategori berhasil diperbarui.');
    }

    public function destroy(Subcategory $subcategory)
    {
        // Proses penghapusan subkategori
        $subcategory->delete();
        return redirect()->route('subcategories.index')->with('success', 'Subkategori berhasil dihapus.');
    }
}
