<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\Master\RController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\Master\DaftarProdukController;
use App\Http\Controllers\Admin\Master\DaftarPetshopController;

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

Route::get('/dashboard', function () {
    return view('/admin/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::group(['prefix' => 'master', 'as' => 'master.', 'namespace' => 'Master', 'middleware' => ['auth']], function () {
        Route::resource('daftar_produk', DaftarProdukController::class);
        Route::group(['prefix' => 'petshop', 'as' => 'petshop.', 'namespace' => 'Master', 'middleware' => ['auth']], function () {
            Route::get('', [DaftarPetshopController::class, 'index'])->name('index');
            Route::put('', [DaftarPetshopController::class, 'update'])->name('update');
        });
    });
    Route::group(['prefix' => 'transaksi', 'as' => 'transaksi.', 'middleware' => ['auth']], function () {
        Route::get('', [TransaksiController::class, 'index'])->name('index');
        Route::get('create', [TransaksiController::class, 'create'])->name('create');
        Route::post('store', [TransaksiController::class, 'store'])->name('store');
        Route::delete('destroy/{id}', [TransaksiController::class, 'destroy'])->name('destroy');
    });
});

require __DIR__ . '/auth.php';
