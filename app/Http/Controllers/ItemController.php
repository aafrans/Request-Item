<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Kategori;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    // Menambahkan middleware untuk otorisasi jika diperlukan
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Menampilkan daftar item
    public function index(Request $request)
    {
        $kategori = Kategori::all();
        $items = Item::paginate(10); // Atur jumlah item per halaman sesuai kebutuhan
        return view('items.index', compact('items', 'kategori'));
    }

    // Menampilkan form untuk membuat item baru
    public function create()
    {
        $kategori = Kategori::all();
        return view('items.create', compact('kategori'));
    }

    // Menyimpan item baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'specifications' => 'nullable|string',
            'quantity' => 'nullable|integer',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('items', 'public');
        }

        Item::create([
            'name' => $request->name,
            'kategori_id' => $request->kategori_id,
            'specifications' => $request->specifications,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imagePath,
        ]);

        return redirect()->route('items.index')->with('success', 'Item berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit item
    public function edit(Item $item)
    {
        $kategori = Kategori::all();
        return view('items.edit', compact('item', 'kategori'));
    }

    // Memperbarui item yang sudah ada
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategori,id',
            'specifications' => 'nullable|string',
            'quantity' => 'nullable|integer',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'kategori_id', 'specifications', 'quantity', 'price', 'stock']);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($item->image && Storage::exists('public/' . $item->image)) {
                Storage::delete('public/' . $item->image);
            }
            // Simpan gambar baru
            $data['image'] = $request->file('image')->store('items', 'public');
        }

        // Perbarui item dengan data baru
        $item->update($data);

        return redirect()->route('items.index')->with('success', 'Item berhasil diperbarui.');
    }

    // Menghapus item
    public function destroy(Item $item)
    {
        // Hapus gambar jika ada
        if ($item->image && Storage::exists('public/' . $item->image)) {
            Storage::delete('public/' . $item->image);
        }

        $item->delete();

        return redirect()->route('items.index')->with('success', 'Item berhasil dihapus.');
    }
}
