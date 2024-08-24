<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('user.dashboard', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|string|in:admin,user',
        ]);

        // Temukan user berdasarkan ID
        $user = User::findOrFail($id);

        // Update data user
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }
        $user->role = $request->input('role');

        // Simpan perubahan
        $user->save();

        // Redirect sesuai dengan role user yang sedang login
        if (auth()->user()->role == 'admin') {
            return redirect()->route('admin.dashboard')->with('success', 'User updated successfully');
        } else {
            return redirect()->route('user.dashboard')->with('success', 'User updated successfully');
        }
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
