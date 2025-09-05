<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\kontakController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\GalleryController;


Route::get('/', function () {
    return view('front.home');   // Beranda
})->name('home');

Route::get('/produk', function () {
    return view('front.produk'); // Produk
})->name('produk');

Route::get('/tentang', function () {
    return view('front.tentang'); // Tentang Kami
})->name('tentang');

Route::get('/kontak', function () {
    return view('front.kontak'); // Kontak
})->name('kontak');
Route::get('/catalog', function () {
    return view('front.catalog'); // Kontak
})->name('catalog');

Route::post('/contact/send', [KontakController::class, 'send'])->name('contact.send');


Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

    Route::resource('products', ProductController::class);
    Route::resource('abouts', AboutController::class);
    Route::resource('contacts', KontakController::class);
    Route::resource('testimonials', TestimoniController::class);
    Route::resource('videos', VideoController::class);
    Route::resource('galleries', GalleryController::class);
});
Auth::routes();