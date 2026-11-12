<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::get('/lupa-password', [AuthController::class, 'showForgot'])->name('password.request');
Route::post('/lupa-password', [AuthController::class, 'resetPassword'])->name('password.update');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');