<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\SellerController;

Route::get('/', function () {
    return view('welcome');
});

// Admin routes
Route::get('/admin', function () {
    return view('admin');
});

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');

    Route::resource('/categories', CategoryController::class);
    Route::resource('/products', ProductController::class);

    // Sellers list
    Route::get('/sellers', [SellerController::class, 'index'])->name('admin.sellers.index');
});