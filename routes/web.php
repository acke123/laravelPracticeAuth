<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShoppingCarController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomepageController::class, 'index'])->name('home');

Route::get('/shop', [ShopController::class, 'index']);
Route::view("/about","about");
Route::view("/contact","contact");

Route::post('/cart/add', [ShoppingCarController::class, 'addToCart'])->name('cartAdd');
Route::get('/shoppingCart', [ShoppingCarController::class, 'index'])->name('cartIndex');

Route::middleware(["auth", AdminCheckMiddleware::class])->prefix('admin')->group(function () {
    Route::controller(ContactController::class)->group(function () {
        Route::get('/all-contact', 'getAllContact')->name('allContact');
        Route::get('/delete-contact/{contact}', 'deleteContact')->name('deleteContact');
        Route::post('/send-contact', 'sendContact');
    });

    Route::controller(ProductsController::class)->group(function () {
        Route::get('/all-products', 'index');
        Route::get('delete-product/{product}', 'deleteProduct')->name('deleteProduct');
        Route::post('/product/edit/{product}', 'singleProduct')->name('singleProduct');
        Route::get('/product/update/{product}', 'updateProduct')->name('updateProduct');
        Route::get('/products/{product}','permaLink')->name('products.permaLink');
    });

    Route::controller(ShopController::class)->group(function () {
       Route::get('/products', 'index');
        Route::post('/productStore', 'storeProduct')->name('storeProduct');
    });
    Route::view("/add-product", "product");
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
