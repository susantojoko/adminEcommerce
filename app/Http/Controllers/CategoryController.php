<?php
namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        
        $categories = Category::all();

        return view('modulkategori.kategori', compact('categories'));
    }

    public function create()
    {
        return view('modulkategori.tambah');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
            'status' => 'required|boolean',
        ]);

         // Handle gambar produk
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        // Generate a unique image name using the current timestamp and the original file name
        $imageName = "http://192.168.2.19:8000/images/" . time() . '_' . $image->getClientOriginalName();
        // Move the uploaded image to the "public/images" directory with the unique name
        $image->move(public_path('images'), $imageName);
        // Update the image field in the validated data with the unique image name
        $validatedData['image'] = $imageName;
    }
        Category::create($validatedData);

        return redirect()->route('categories.index')->with('successtmb', 'Kategori berhasil diitambah.');
    }

    public function show(Category $category)
    {
        return view('modulkategori.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('modulkategori.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'slug' => 'required|string|max:255',
            'status' => 'required|boolean', 
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi gambar
        ]);

        if ($request->hasFile('new_image')) {
            // Proses gambar baru
            $image = $request->file('new_image');
            $imageName = "http://192.168.2.19:8000/images/" . time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $validatedData['image'] = $imageName;
        }

        $category->update($validatedData);

        return redirect()->route('categories.index')->with('successup', 'Kategori berhasil diperbarui.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('successdel', 'Kategori berhasil dihapus.');
    }
}
