<?php

use Illuminate\Support\Facades\Route;


Route::prefix('/admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return "ADMIN DASHBOARD";
    })->name('dashboard');

    Route::get('/categories', function () {
        return "ADMIN CATEGORIES";
    })->name('categories');

    Route::get('/products', function () {
        return "ADMIN PRODUCTS";
    })->name('products');

    Route::get('/orders', function () {
        return "ADMIN ORDERS";
    })->name('orders');
});
