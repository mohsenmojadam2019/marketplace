<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use marketplace\src\Http\Controllers\AuthController;
use marketplace\src\Http\Controllers\ProductController;
use marketplace\src\Http\Controllers\CategoryController;
use marketplace\src\Http\Controllers\OrderController;

Route::group(['prefix' => 'auth'], function () {
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/{category}', [CategoryController::class, 'show']);
    Route::post('/', [CategoryController::class, 'store']);
    Route::put('/{category}', [CategoryController::class, 'update']);
    Route::delete('/{category}', [CategoryController::class, 'destroy']);
});

Route::group(['prefix' => 'products'], function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{product}', [ProductController::class, 'show']);
    Route::post('/', [ProductController::class, 'store']);
    Route::put('/{product}', [ProductController::class, 'update']);
    Route::delete('/{product}', [ProductController::class, 'destroy']);
});

Route::group(['prefix' => 'orders', 'middleware' => 'auth:sanctum'], function () {
    Route::get('/', [OrderController::class, 'index']);
    Route::get('/{order}', [OrderController::class, 'show']);
    Route::post('/', [OrderController::class, 'store']);
    Route::put('/{order}', [OrderController::class, 'update']);
    Route::delete('/{order}', [OrderController::class, 'destroy']);
});


