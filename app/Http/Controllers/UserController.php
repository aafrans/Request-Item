<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ApprovedItem;
use App\Models\Item;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        // Ambil kategori unik dari item
        $items = Item::select('kategori_id')->distinct()->get();
        $kategori = Kategori::get();

        // Ambil seluruh data pengguna
        $users = User::get();

        // Hitung total stok untuk setiap kategori
        $countStock = Item::select('kategori_id', DB::raw('SUM(stock) as total_stock'))
            ->groupBy('kategori_id')
            ->get();

        // Tampilkan view dashboard dengan data items, kategori, dan stok
        return view('user.dashboard', compact('users', 'items', 'kategori', 'countStock'));
    }

    public function requestItem(Request $request, $id)
    {
        $item = Item::findOrFail($id);

        // Validasi input
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $item->stock,
        ]);

        // Pastikan stok mencukupi
        if ($request->input('quantity') > $item->stock) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi.');
        }

        // Kurangi stok item
        $item->stock -= $request->input('quantity');
        $item->save();

        // Buat catatan permintaan
        ApprovedItem::create([
            'item_id' => $item->id,
            'quantity' => $request->input('quantity'),
            'user_id' => auth()->id(),  // Menyimpan ID pengguna yang meminta barang
        ]);

        return redirect()->back()->with('success', 'Permintaan berhasil diproses.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Temukan user berdasarkan ID
        $user = User::findOrFail($id);

        // Update hanya data role user
        $user->role = $request->input('role');

        // Simpan perubahan
        $user->save();

        return redirect()->route('admin.dashboard')->with('success', 'User role updated successfully');
    }

    public function dashboard()
    {
        // Cek apakah user memiliki role
        if (auth()->user()->role == null || auth()->user()->role == '') {
            return redirect()->route('no_role')->with('error', 'Your role is not assigned yet. Please contact the administrator.');
        }

        // Arahkan ke dashboard sesuai role
        if (auth()->user()->role == 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif (auth()->user()->role == 'user') {
            return redirect()->route('user.dashboard');
        }

        // Jika role tidak dikenal, logout user
        auth()->logout();
        return redirect()->route('login')->with('error', 'Unknown role. Please contact the administrator.');
    }
}
