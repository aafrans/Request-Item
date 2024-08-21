<?php

namespace App\Http\Controllers;

use App\Models\permintaan;
use App\Models\User;
use App\Models\Item;
use Illuminate\Http\Request;

class RequestController extends Controller
{
      /**
     * Menampilkan daftar permintaan dengan pencarian dan filter.
     */
    public function index(Request $request)
    {
        $query = permintaan::query();

        // Pencarian dan filter untuk admin
        if ($request->filled('search')) {
            $query->whereHas('item', function ($q) use ($request) {
                $q->where('name', 'like', "%{$request->search}%");
            });
        }

        $requests = $query->paginate(10); // Menampilkan 10 permintaan per halaman

        return view('items.index', compact('requests'));
    }

    /**
     * Menampilkan form untuk membuat permintaan baru.
     */
    public function create()
    {
        $users = User::all(); // Mengambil semua user dari database
        $items = Item::all(); // Mengambil semua item dari database

        return view('items.create', compact('users', 'items'));
    }

    /**
     * Menyimpan permintaan baru ke database.
     */
    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'item_id' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1',
            'status' => 'required|in:cek_spek,cek_stok,user_memo,it_beli,it_info',
            'memo' => 'nullable|string',
        ]);

        // Simpan data ke database
        permintaan::create($validatedData);

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('requests.index')->with('success', 'Request created successfully.');
    }

    /**
     * Menampilkan detail permintaan berdasarkan ID.
     */
    public function show($id)
    {
        $request = permintaan::findOrFail($id); // Menemukan permintaan berdasarkan ID

        return view('items.show', compact('request'));
    }

}
