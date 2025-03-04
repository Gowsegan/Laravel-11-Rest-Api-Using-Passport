<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/refresh', [AuthController::class, 'refresh']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api');
Route::post('/reset-password', [AuthController::class, 'resetPassword']);

// Protected routes
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
