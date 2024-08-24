<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with('kategori')->get();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('items.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'name' => 'required|string|max:255',
            'specifications' => 'nullable|string',
            'quantity' => 'nullable|integer',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('items', 'public');
            $data['image'] = $imagePath;
        }

        Item::create($data);

        return redirect()->route('items.index')->with('success', 'Item created successfully.');
    }

    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    public function edit(Item $item)
    {
        $kategori = Kategori::all();
        return view('items.edit', compact('item', 'kategori'));
    }

    public function update(Request $request, Item $item)
    {
        $request->validate([
            'kategori_id' => 'required|exists:kategori,id',
            'name' => 'required|string|max:255',
            'specifications' => 'nullable|string',
            'quantity' => 'nullable|integer',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('items', 'public');
            $data['image'] = $imagePath;
        }

        $item->update($data);

        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }
}
