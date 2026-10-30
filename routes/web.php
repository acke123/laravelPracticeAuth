<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomepageController::class, 'index'])->name('home');

Route::get('/shop', [ShopController::class, 'index']);
Route::view("/about","about");
Route::view("/contact","contact");

Route::get('/admin/all-contact', [ContactController::class, 'getAllContact']);
Route::get('/admin/delete-contact/{contact}',[ContactController::class, 'deleteContact'])->name('deleteContact');

Route::post('/send-contact', [ContactController::class, 'sendContact']);

Route::view("/admin/add-product", "product");
Route::get('/admin/products', [ShopController::class, 'index']);
Route::post("/admin/productStore", [ShopController::class, 'storeProduct'])->name('storeProduct');

Route::get('/admin/all-products', [ProductsController::class, 'index']);
Route::get('/admin/delete-product/{product}',[ProductsController::class, 'deleteProduct'])->name('deleteProduct');
Route::get('/admin/product/edit/{product}',[ProductsController::class, 'singleProduct'])->name('singleProduct');
Route::post('/admin/product/update/{product}',[ProductsController::class, 'updateProduct'])->name('updateProduct');

