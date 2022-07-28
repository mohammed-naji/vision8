<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('users', function() { return 'Admin Users'; })->name('user');
    Route::get('posts', function() { return 'Admin posts'; })->name('posts');
    Route::get('comments', function() { return 'Admin comments'; })->name('comments');
    Route::get('products', function() { return 'Admin products'; })->name('products');
    Route::get('orders', function() { return 'Admin orders'; })->name('orders');
    Route::get('payment', function() { return 'Admin payment'; })->name('payment');
});
