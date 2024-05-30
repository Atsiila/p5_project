<?php
use App\Models\Berita;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $berita = Berita::all();
    return view('welcome', compact ('berita'));
});

Route::get('/detail/{id}', [App\Http\Controllers\BeritaController::class, 'tampil']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Awal route /Penulis
Route::resource('penulis', App\Http\Controllers\PenulisController::class)->middleware('auth');

Route::post('penulis/export-penulis', [App\Http\Controllers\PenulisController::class, 'viewPDF'])->name('penulis.view-pdf');
// A route /penulis


// Awal route /kategori
Route::resource('kategori', App\Http\Controllers\KategoriController::class)->middleware('auth');

// A  route /kategori

Route::post('kategori/export-kategori', [App\Http\Controllers\KategoriController::class, 'viewPDF'])->name('kategori.view-pdf');


//route berita
Route::resource('berita', App\Http\Controllers\BeritaController::class)->middleware('auth');
Route::post('berita/export-berita', [App\Http\Controllers\BeritaController::class, 'viewPDF'])->name('berita.view-pdf');

