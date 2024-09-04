<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;


class PermintaanController extends Controller
{
    //
    public function index()
    {
        $requests = Request::with('item')->get(); // Mengambil semua data permintaan
        return view('requests.index', compact('requests'));
    }

    public function create()
    {
        $items = Item::all(); // Ambil data item untuk dropdown
        return view('requests.create', compact('items'));
    }

    // public function store(HttpRequest $request)
    // {
    //     $request->validate([
    //         'user_id' => 'required|exists:users,id',
    //         'item_id' => 'required|exists:items,id',
    //         'quantity' => 'required|integer',
    //         'status' => 'required|in:cek_spek,cek_stok,user_memo,it_beli,it_info',
    //         'memo' => 'nullable|string',
    //     ]);

    //     Request::create($request->all());

    //     return redirect()->route('requests.index')->with('success', 'Request created successfully.');
    // }

    public function show(Request $request)
    {
        return view('requests.show', compact('request'));
    }

    public function edit(Request $request)
    {
        $items = Item::all(); // Ambil data item untuk dropdown
        return view('requests.edit', compact('request', 'items'));
    }

    // public function update(HttpRequest $request, Request $requestModel)
    // {
    //     $request->validate([
    //         'user_id' => 'required|exists:users,id',
    //         'item_id' => 'required|exists:items,id',
    //         'quantity' => 'required|integer',
    //         'status' => 'required|in:cek_spek,cek_stok,user_memo,it_beli,it_info',
    //         'memo' => 'nullable|string',
    //     ]);

    //     $requestModel->update($request->all());

    //     return redirect()->route('requests.index')->with('success', 'Request updated successfully.');
    // }

    public function destroy(Request $request)
    {
        $request->delete();
        return redirect()->route('requests.index')->with('success', 'Request deleted successfully.');
    }
}
