<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('index', [
            'title' => 'Главная страница'
        ]);
    }

    public function authUser()
    {
        if (auth()->attempt(['email' => request('email'), 'password' => request('password')]))
        {
            return redirect()->route('index');
        }
        return redirect()->route('authPage');;
        
    }

    public function authPage()
    {
        return view('auth', [
            'title' => 'Авторизация'
        ]);
    }
}
