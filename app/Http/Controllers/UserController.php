<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $items = Item::get();
        $users = User::get();
        return view('user.dashboard', compact('users', 'items'));
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

        // Redirect sesuai dengan role user yang sedang login

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
