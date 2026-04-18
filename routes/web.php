<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

Route::get('/', [BasicController::class, 'index'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login_post', [AuthController::class, 'login_post'])->name('login.post');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register_post', [AuthController::class, 'register_post'])->name('register.post');
});

Route::middleware('auth')->group(function () {
    Route::get('/apps', [BasicController::class, 'apps'])->name('apps');
    Route::post('/apps_review/{id}', [BasicController::class, 'apps_review'])->name('apps.review');
    Route::get('/apps_create', [BasicController::class, 'apps_create'])->name('apps.create');
    Route::post('/apps_create_post', [BasicController::class, 'apps_create_post'])->name('apps.create.post');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('admin')->group(function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin');
        Route::post('/admin/post/{id}', [AdminController::class, 'post'])->name('admin.post');
    });
});
