<?php

namespace App\Http\Controllers;

use App\Models\ApprovedItem;

class PermintnDiTerimaController extends Controller
{
    public function __construct()
    {
        // Middleware untuk memastikan hanya admin yang bisa mengakses controller ini
        $this->middleware('admin');
    }

    // Method untuk menampilkan daftar permintaan barang yang belum diproses
    public function index()
    {
        // Mengambil permintaan dengan status 'requested' (belum diproses) menggunakan model Request
        $requests = ApprovedItem::where('status', 'requested')->get();

        // Mengirim data permintaan ke view admin.request.index
        return view('admin.dashboard', compact('requests'));
    }

    // Method untuk menerima permintaan barang
    public function approve($id)
    {
        // Mencari permintaan berdasarkan id menggunakan model Request
        $request = ApprovedItem::findOrFail($id);

        // Update status permintaan menjadi 'approved'
        $request->status = 'approved';
        $request->save();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.dashboard')->with('success', 'Permintaan barang telah diterima.');
    }

    // Method untuk menolak permintaan barang
    public function reject($id)
    {
        // Mencari permintaan berdasarkan id menggunakan model Request
        $request = ApprovedItem::findOrFail($id);

        // Update status permintaan menjadi 'rejected'
        $request->status = 'rejected';
        $request->save();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.dashboard')->with('success', 'Permintaan barang telah ditolak.');
    }

    // Method untuk menampilkan detail permintaan barang
    public function show($id)
    {
        // Mencari permintaan berdasarkan id menggunakan model Request
        $request = ApprovedItem::findOrFail($id);

        // Menampilkan view detail permintaan
        return view('admin.show', compact('request'));
    }
}
