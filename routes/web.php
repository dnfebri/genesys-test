<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/inventory', [App\Http\Controllers\InventoryController::class, 'index'])->name('inventory');
Route::get('/inventory/add', [App\Http\Controllers\InventoryController::class, 'create'])->name('inventory.create');
Route::get('/inventory/add/{inventory}', [App\Http\Controllers\InventoryController::class, 'editStock'])->name('inventory.editStock');
Route::put('/inventory/add/{inventory}', [App\Http\Controllers\InventoryController::class, 'updateStock'])->name('inventory.updateStock');
Route::post('/inventory', [App\Http\Controllers\InventoryController::class, 'store'])->name('inventory.store');
Route::get('/inventory/{inventory}/edit', [App\Http\Controllers\InventoryController::class, 'edit'])->name('inventory.edit');
Route::put('/inventory/{inventory}', [App\Http\Controllers\InventoryController::class, 'update'])->name('inventory.update');
Route::delete('/inventory/{inventory}', [App\Http\Controllers\InventoryController::class, 'destroy'])->name('inventory.destroy');

Route::get('/pembelian', [App\Http\Controllers\TransactionController::class, 'index'])->name('pembelian.index');
Route::get('/pembelian/add', [App\Http\Controllers\TransactionController::class, 'create'])->name('pembelian.create');
Route::get('/pembelian/{transaction}', [App\Http\Controllers\TransactionController::class, 'show'])->name('pembelian.show');
Route::put('/pembelian/add', [App\Http\Controllers\TransactionController::class, 'update'])->name('pembelian.update');
