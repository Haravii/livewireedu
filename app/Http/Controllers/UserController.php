<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use App\Models\Status;
use Illuminate\Support\Facades\Validator;

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
        $validation = request()->validate([
            'email' => [
                'required', 
                'email',
                'exists:users,email'
            ],
            'password' => ['required']
        ]);
   
        if (auth()->attempt(['email' => $validation['email'], 'password' => $validation['password']]))
        {
        }
        return redirect()->route('index');
        
    }
}
