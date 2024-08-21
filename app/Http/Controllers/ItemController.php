<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Kategori;

class ItemController extends Controller
{
       // Menampilkan daftar item
       public function index()
       {
           $items = Item::with('kategori')->get(); // Mengambil semua item dengan relasi kategori
           return view('items.index', compact('items'));
       }

       // Menampilkan form untuk membuat item baru
       public function create()
       {
           $kategories = Kategori::all(); // Mengambil semua kategori
           return view('items.create', compact('kategories'));
       }

       // Menyimpan item baru
       public function store(Request $request)
       {
           $request->validate([
               'kategori_id' => 'required|exists:kategori,id',
               'name' => 'required|string|max:255',
               'specifications' => 'nullable|string',
               'quantity' => 'nullable|integer',
               'price' => 'required|numeric',
               'stock' => 'required|numeric',
               'image' => 'nullable|string',
           ]);

           Item::create($request->all());

           return redirect()->route('items.index')->with('success', 'Item created successfully.');
       }

       // Menampilkan detail item
       public function show(Item $item)
       {
           return view('items.show', compact('item'));
       }

       // Menampilkan form untuk mengedit item
       public function edit(Item $item)
       {
           $kategories = Kategori::all(); // Mengambil semua kategori
           return view('items.edit', compact('item', 'kategories'));
       }

       // Memperbarui item
       public function update(Request $request, Item $item)
       {
           $request->validate([
               'kategori_id' => 'required|exists:kategori,id',
               'name' => 'required|string|max:255',
               'specifications' => 'nullable|string',
               'quantity' => 'nullable|integer',
               'price' => 'required|numeric',
               'stock' => 'required|numeric',
               'image' => 'nullable|string',
           ]);

           $item->update($request->all());

           return redirect()->route('items.index')->with('success', 'Item updated successfully.');
       }

       // Menghapus item
       public function destroy(Item $item)
       {
           $item->delete();
           return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
       }
}
