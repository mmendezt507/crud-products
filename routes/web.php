<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::controller(ProductController::class)->group(function () {
    Route::get('/products','index')->name('products.index');
    Route::put('/products','store')->name('products.store');
    Route::get('/products/create','create')->name('products.create');
    Route::get('/products/edit/{id}','edit')->name('products.edit');
    Route::put('/products/{id}','update')->name('products.update');
    Route::get('/products/{id}','destroy')->name('products.delete');
});
