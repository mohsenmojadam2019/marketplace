<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use Shab\Marketplace\Http\Controllers\ProductController;
use Shab\Marketplace\Http\Controllers\CategoryController;

Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/{categoryId}', [CategoryController::class, 'show']);
    Route::post('/search', [CategoryController::class, 'search']);
    Route::get('/{categoryId}/products', [CategoryController::class, 'categoryProducts']);
    Route::post('/', [CategoryController::class, 'store']);
    Route::put('/{categoryId}', [CategoryController::class, 'update']);
    Route::delete('/{categoryId}', [CategoryController::class, 'destroy']);
});

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{productId}', [ProductController::class, 'show']);
    Route::post('/search', [ProductController::class, 'search']);
    Route::post('/filter-by-max-price', [ProductController::class, 'filterByMaxPrice']);
    Route::get('/sort-by-min-price', [ProductController::class, 'sortByMinPrice']);
    Route::get('/user/{userId}', [ProductController::class, 'userProducts']);
    Route::post('/{productId}/store', [ProductController::class, 'store']);
    Route::post('/{productId}/update', [ProductController::class, 'update']);
    Route::delete('/{productId}/delete', [ProductController::class, 'delete']);

});

Route::apiResource('orders', CategoryController::class);
