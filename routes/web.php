<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomepageController::class, 'index'])->name('home');

Route::get('/shop', [ShopController::class, 'index']);
Route::view("/about","about");
Route::view("/contact","contact");


Route::middleware(["auth", AdminCheckMiddleware::class])->prefix('admin')->group(function () {
    Route::get('/all-contact', [ContactController::class, 'getAllContact']);
    Route::get('/delete-contact/{contact}',[ContactController::class, 'deleteContact'])->name('deleteContact');

    Route::post('/send-contact', [ContactController::class, 'sendContact']);

    Route::view("/add-product", "product");
    Route::get('/products', [ShopController::class, 'index']);
    Route::post("/productStore", [ShopController::class, 'storeProduct'])->name('storeProduct');

    Route::get('/all-products', [ProductsController::class, 'index']);
    Route::get('/delete-product/{product}',[ProductsController::class, 'deleteProduct'])->name('deleteProduct');
    Route::get('/product/edit/{product}',[ProductsController::class, 'singleProduct'])->name('singleProduct');
    Route::post('/product/update/{product}',[ProductsController::class, 'updateProduct'])->name('updateProduct');
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
