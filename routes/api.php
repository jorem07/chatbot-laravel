<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::middleware('log.route')->post('/auth/login', [AuthController::class, 'login'])->name('api.login');
