<?php

use App\Http\Controllers\Admin\CategoriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\VoucherController;
use App\Http\Controllers\Admin\CommentsController;
use App\Http\Controllers\Admin\PostController;

// Nhóm route dành cho Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('admin.users');
    Route::get('/category', [CategoriesController::class, 'index'])->name('admin.categories');
    Route::get('/orders', [OrderController::class, 'index'])->name('admin.orders');
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products');
    Route::get('/settings', [SettingController::class, 'index'])->name('admin.settings');
    Route::get('/vouchers', [VoucherController::class, 'index'])->name('admin.vouchers');
    Route::get('/comments', [CommentsController::class, 'index'])->name('admin.comments');
    Route::get('/posts', [PostController::class, 'index'])->name('admin.posts');
    
    // Route đăng xuất
    // Route::post('/logout', [DashboardController::class, 'logout'])->name('admin.logout');
