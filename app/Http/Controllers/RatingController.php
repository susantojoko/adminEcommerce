<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{
    public function index()
    {
        $ratings = Rating::with('user','product')->get();
        return view('modulrating.rating', compact('ratings'));
    }

    public function create()
    {
        return view('modulrating.tambah');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_produk' => 'required',
            'id_user' => 'required',
            'rating' => 'required',
            'komentar' => 'nullable',
        ]);

        Rating::create($validatedData);

        return redirect()->route('ratings.index');
    }

    public function show(Rating $rating)
    {
        return view('modulrating.show', compact('rating'));
    }

    public function edit(Rating $rating)
    {
        return view('modulrating.edit', compact('rating'));
    }

    public function update(Request $request, Rating $rating)
    {
        $validatedData = $request->validate([
            'id_produk' => 'required',
            'id_user' => 'required',
            'rating' => 'required',
            'komentar' => 'nullable',
        ]);

        $rating->update($validatedData);

        return redirect()->route('ratings.index');
    }

    public function destroy(Rating $rating)
    {
        $rating->delete();
        return redirect()->route('ratings.index');
    }
}
