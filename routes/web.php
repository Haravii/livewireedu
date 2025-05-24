<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

Route::get('/', [UserController::class, 'index'])->name('index');

Route::get('/auth', [UserController::class, 'authPage'])->name('authPage');

Route::post('/authUser', [UserController::class, 'authUser'])->name('authUser');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/register', [AdminController::class, 'register'])->name('register');

    Route::post('/registerUser', [AdminController::class, 'registerUser'])->name('registerUser');
    
});
