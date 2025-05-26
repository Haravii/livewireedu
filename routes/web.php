<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TaskController;

Route::get('/', [UserController::class, 'index'])->name('index');

Route::get('/auth', [UserController::class, 'authPage'])->name('authPage');
Route::get('/logoutUser', [UserController::class, 'logoutUser'])->name('logoutUser');

Route::get('/newStatus', [TaskController::class, 'newStatus'])->name('newStatus');

Route::post('/createNewTask', [TaskController::class, 'createNewTask'])->name('createNewTask');
Route::post('/authUser', [UserController::class, 'authUser'])->name('authUser');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::get('/register', [AdminController::class, 'register'])->name('register');
    Route::get('/newStatus', [TaskController::class, 'newStatus'])->name('newStatus');

    Route::post('/createNewStatus', [TaskController::class, 'createNewStatus'])->name('createNewStatus');
    Route::post('/registerUser', [AdminController::class, 'registerUser'])->name('registerUser');
    
});
