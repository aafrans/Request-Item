<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PermintaanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;





Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        if (auth()->user()->role === 'admin') {
            return app(AdminController::class)->index();
        } else {
            return app(UserController::class)->index();
        }
    })->name('dashboard');

    // Routes for admin dashboard
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');



    // Routes for user dashboard
    Route::get('/user', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('user.update');
    Route::resource('/user/request', PermintaanController::class);
    // Request user



    // Routes for ItemController
    Route::get('/items', [ItemController::class, 'index'])->name('items.index');
    Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
    Route::post('/items', [ItemController::class, 'store'])->name('items.store');
    Route::get('/items/{item}', [ItemController::class, 'show'])->name('items.show');
    Route::get('/items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');
    Route::put('/items/{item}', [ItemController::class, 'update'])->name('items.update');
    Route::delete('/items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');

    Route::resource('/kategori', KategoriController::class);
});
