<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StockController extends Controller
{

    /**
     * Menampilkan halaman cek stok.
     */
    public function checkStock()
    {
        return view('items.check');
    }
}
