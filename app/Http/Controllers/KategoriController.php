<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $imagePath = $request->file('image') ? $request->file('image')->store('images', 'public') : null;

            Kategori::create([
                'name' => $request->name,
                'image' => $imagePath,
            ]);

            return redirect()->route('kategori.index')->with('success', 'Category created successfully.');
        } catch (\Exception $e) {
            Log::error('Error creating category: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to create category.');
        }
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $kategori = Kategori::findOrFail($id);

        try {
            // Hapus gambar lama jika ada gambar baru
            if ($request->hasFile('image')) {
                if ($kategori->image) {
                    if (!Storage::delete('public/' . $kategori->image)) {
                        Log::error('Failed to delete old image: ' . $kategori->image);
                    }
                }
                $imagePath = $request->file('image')->store('images', 'public');
            } else {
                $imagePath = $kategori->image;
            }

            $kategori->update([
                'name' => $request->name,
                'image' => $imagePath,
            ]);

            return redirect()->route('kategori.index')->with('success', 'Category updated successfully.');
        } catch (\Exception $e) {
            Log::error('Error updating category: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to update category.');
        }
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);

        try {
            if ($kategori->image) {
                if (!Storage::delete('public/' . $kategori->image)) {
                    Log::error('Failed to delete image: ' . $kategori->image);
                }
            }
            $kategori->delete();

            return redirect()->route('kategori.index')->with('success', 'Category deleted successfully.');
        } catch (\Exception $e) {
            Log::error('Error deleting category: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to delete category.');
        }
    }
}
