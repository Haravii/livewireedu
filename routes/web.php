<?php

use App\Livewire\User\UserCreate;
use App\Livewire\User\Userlist;
use Illuminate\Support\Facades\Route;
use App\Livewire\User;

// Route::get('/', function () {
//     return view('welcome');
// })->name("welcome");

Route::get('/', Userlist::class)->name('home');
Route::get('/create-user', UserCreate::class)->name('create-user');