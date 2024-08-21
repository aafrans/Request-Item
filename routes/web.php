<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MemoController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;








/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



// Rute autentikasi default (login, register, dll.)
Auth::routes();

// Route untuk dashboard pengguna
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('user.dashboard');
    Route::get('/requests', [RequestController::class, 'index'])->name('requests.index');
    Route::get('/requests/{id}', [RequestController::class, 'show'])->name('requests.show');
    Route::get('/stock/check', [StockController::class, 'check'])->name('stock.check');
    Route::get('/user/memos', [MemoController::class, 'index'])->name('user.memos');
    Route::get('/items', [ItemController::class, 'index'])->name('items.index');
    Route::post('/items', [ItemController::class, 'store'])->name('items.store');
});

// Route untuk dashboard admin (memastikan pengguna adalah admin)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});
