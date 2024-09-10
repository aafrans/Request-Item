<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ApprovedItem;
use App\Models\Item;
use Illuminate\Http\Request;


class PermintaanController extends Controller
{
    public function store(Request $request, $id)
    {
        $item = Item::findOrFail($id);

        // Validasi input
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $item->stock,
        ]);

        // Kurangi stok
        $item->stock -= $request->input('quantity');
        $item->save();

        // Simpan permintaan yang disetujui
        ApprovedItem::create([
            'item_id' => $item->id,
            'quantity' => $request->input('quantity'),
        ]);

        return redirect()->back()->with('success', 'Permintaan berhasil diproses.');
    }
    //
    public function index()
    {
        $requests = Request::with('item')->get(); // Mengambil semua data permintaan
        return view('permintaan.index', compact('requests'));
    }

    public function create()
    {
        $items = Item::all(); // Ambil data item untuk dropdown
        return view('permintaan.create', compact('items'));
    }

    public function show(Request $request)
    {
        return view('permintaan.show', compact('request'));
    }

    public function edit(Request $request)
    {
        $items = Item::all(); // Ambil data item untuk dropdown
        return view('permintaan.edit', compact('request', 'items'));
    }
    public function destroy(Request $request)
    {
        $request->delete();
        return redirect()->route('permintaan.index')->with('success', 'Request deleted successfully.');
    }
}
