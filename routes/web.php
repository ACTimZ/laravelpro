<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

Route::get('/', [BasicController::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'registerIndex'])->name('register');
    Route::get('/login', [AuthController::class, 'loginIndex'])->name('login');
    Route::post('/register-store', [AuthController::class, 'register'])->name('register-store');
    Route::post('/login-store', [AuthController::class, 'login'])->name('login-store');
});

Route::middleware('auth')->group(function () {
    Route::get('/apps', [BasicController::class, 'appsIndex'])->name('apps');
    Route::get('/create-apps', [BasicController::class, 'apps'])->name('create-apps');
    Route::get('/logout', [BasicController::class, 'logout'])->name('logout');
    Route::post('/create-apps-store', [BasicController::class, 'appsStore'])->name('create-apps-store');

    Route::middleware('admin')->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin');
        Route::get('/admin-store/{id}', [AdminController::class, 'update'])->name('admin-store');
    });
});
