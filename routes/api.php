<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::post('/auth/login', [AuthController::class, 'login'])->name('api.login');
Route::middleware('auth:sanctum')->post('/user', [UserController::class, 'index'])->name('api.index');
// Route::middleware('auth:sanctum')->post('/auth/login', [AuthController::class, 'login'])->name('login');

