<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TaskController;

Route::get('/', [UserController::class, 'index'])->name('index');

Route::get('/logoutUser', [UserController::class, 'logoutUser'])->name('logoutUser')->middleware('auth');

Route::get('/newTask', [TaskController::class, 'newTask'])->name('newTask')->middleware('auth');

Route::get('/deleteTask', [TaskController::class, 'deleteTask'])->name('deleteTask')->middleware('auth');
Route::get('/changeTaskStatus', [TaskController::class, 'changeTaskStatus'])->name('changeTaskStatus')->middleware('auth');
Route::post('/createNewTask', [TaskController::class, 'createNewTask'])->name('createNewTask')->middleware('auth');
Route::post('/authUser', [UserController::class, 'authUser'])->name('authUser')->middleware('guest');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index')->middleware('auth');
    Route::get('/register', [AdminController::class, 'register'])->name('register')->middleware('auth');
    Route::get('/newStatus', [TaskController::class, 'newStatus'])->name('newStatus')->middleware('auth');

    Route::post('/createNewStatus', [TaskController::class, 'createNewStatus'])->name('createNewStatus')->middleware('auth');
    Route::post('/registerUser', [AdminController::class, 'registerUser'])->name('registerUser')->middleware('auth');
    
});
