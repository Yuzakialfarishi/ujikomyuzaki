<?php

use Illuminate\Support\Facades\Route;

// Controllers Frontend
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\KontakController;

// Controllers Admin
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminBeritaController;
use App\Http\Controllers\Admin\AdminGaleriController;
use App\Http\Controllers\Admin\AdminKontakController;


/*
|--------------------------------------------------------------------------
| HALAMAN USER (FRONTEND)
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Tentang
Route::view('/tentang', 'tentang')->name('tentang');

// Galeri
Route::get('/galeri', [GaleriController::class, 'index'])
    ->name('galeri.index');

// Galeri detail
Route::get('/galeri/{id}', [GaleriController::class, 'detail'])
    ->name('galeri.detail');

// Berita
Route::get('/berita', [BeritaController::class, 'index'])
    ->name('berita.index');

// Berita detail (by slug)
Route::get('/berita/{slug}', [BeritaController::class, 'detail'])
    ->name('berita.detail');

// Kontak User
Route::get('/kontak', [KontakController::class, 'index'])
    ->name('kontak.index');

Route::post('/kontak/kirim', [KontakController::class, 'store'])
    ->name('kontak.store');



/*
|--------------------------------------------------------------------------
| ADMIN PANEL
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard
        Route::get('/', [AdminHomeController::class, 'index'])
            ->name('home');

        // Also accept /admin/home for compatibility with older links
        Route::get('home', [AdminHomeController::class, 'index']);

        // CRUD Berita
        Route::resource('berita', AdminBeritaController::class)
            ->except(['show']);

        // CRUD Galeri
   Route::resource('galeri', AdminGaleriController::class)
            ->except(['show']);


        // CRUD Kontak: index, create, store, destroy
        Route::get('kontak/export', [AdminKontakController::class, 'export'])
            ->name('kontak.export');

        Route::resource('kontak', AdminKontakController::class)
            ->only(['index', 'create', 'store', 'destroy']);
    });
