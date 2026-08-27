<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Auth routes
Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register'])
        ->middleware('throttle:3,60');
    
    Route::post('/login', [AuthController::class, 'login'])
        ->middleware('throttle:3,60');
    
    Route::post('/logout', [AuthController::class, 'logout'])
        ->middleware('auth:sanctum');
    
    Route::post('/refresh', [AuthController::class, 'refresh'])
        ->middleware('auth:sanctum');
    
    Route::get('/me', [AuthController::class, 'me'])
        ->middleware('auth:sanctum');
});

// Public product routes
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);

// Protected product routes
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
});