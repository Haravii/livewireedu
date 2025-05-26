<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\Status;

class UserController extends Controller
{

    public function index()
    {
        $statuses = Status::get();
        $tasks = Task::get();
        return view('index', [
            'title' => 'Главная страница',
            'tasks' => $tasks,
            'statuses' => $statuses
        ]);
    }

    public function logoutUser()
    {
        auth()->logout();
 
        request()->session()->invalidate();
 
        request()->session()->regenerateToken();

        return redirect()->route('index');
    }

    public function authUser()
    {
        if (auth()->attempt(['email' => request('email'), 'password' => request('password')]))
        {
            return redirect()->route('index');
        }
        return redirect()->route('authPage');;
        
    }
}
