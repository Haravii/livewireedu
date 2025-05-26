<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;


class AdminController extends Controller
{

    public function index()
    {
        return view('admin.index', [
            'title' => 'Админская страница'
        ]);
    }

    public function register()
    {
        return view('admin.registerUser', [
            'title' => 'Создание пользователя'
        ]);
    }

    public function registerUser()
    {
        $validatedData = request()->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users', 'email'],
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        $hashed = bcrypt($validatedData['password']);

        $user = new User;
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = $hashed;
        if (isset(request()->isAdmin))
        {
            $user->is_admin = 1;
        }
        
        $user->save();

        return redirect()->route('admin.index');
    }
}
