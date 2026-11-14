<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenyewaanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/penyewaan', [PenyewaanController::class, 'index'])->name('penyewaan.index');
