<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\KeunggulanController;
use App\Http\Controllers\ProductPriceController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/produk',[ProductController::class, 'index_front'])->name('produk');
Route::get('/tentang',[AboutController::class, 'index_front'])->name('tentang');
Route::get('/kontak',[KontakController::class, 'index_front'])->name('kontak');

// Route::get('/catalog', function () {
//     return view('front.catalog'); // Kontak
// })->name('catalog');

Route::get('/products/{id}', [HomeController::class, 'show'])->name('catalog.show');

Route::post('/contact/send', [KontakController::class, 'send'])->name('contact.send');



Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::resource('heroes', HeroController::class);

    Route::resource('keunggulans', KeunggulanController::class);
    Route::get('products/{product}/prices', [ProductPriceController::class, 'index'])->name('product-prices.index');
    Route::get('products/{product}/prices/create', [ProductPriceController::class, 'create'])->name('product-prices.create');
    Route::post('products/{product}/prices', [ProductPriceController::class, 'store'])->name('product-prices.store');
    Route::get('products/{product}/prices/{price}/edit', [ProductPriceController::class, 'edit'])->name('product-prices.edit');
    Route::put('products/{product}/prices/{price}', [ProductPriceController::class, 'update'])->name('product-prices.update');
    Route::delete('products/{product}/prices/{price}', [ProductPriceController::class, 'destroy'])->name('product-prices.destroy');

    Route::resource('products', ProductController::class);
    Route::resource('abouts', AboutController::class);
    Route::resource('contacts', KontakController::class);
    Route::resource('testimonials', TestimoniController::class);
    Route::resource('videos', VideoController::class);
    Route::resource('galleries', GalleryController::class);
});
Auth::routes();