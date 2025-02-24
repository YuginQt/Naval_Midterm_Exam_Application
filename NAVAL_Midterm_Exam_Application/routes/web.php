<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/products', [ProductController::class, 'showProducts'])->name('products');
Route::get('/', function () {
    return view('welcome');
});
