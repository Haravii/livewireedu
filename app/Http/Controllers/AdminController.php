<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use App\Models\Status;


class AdminController extends Controller
{

    public function index()
    {
        $users = User::get();
        return view('admin.index', [
            'title' => 'Админская страница',
            'users' => $users
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

    public function usersTasks()
    {
        $validatedData = request()->validate([
            'userId' => ['required', 'integer']
        ]);
        if($user = User::find($validatedData['userId']))
        {
            $statuses = Status::get();
            return view('admin.usersTasks', [
            'title' => 'Задачи пользователя',
            'user' => $user,
            'statuses' => $statuses
            ]);
        }
        return redirect()->back();
    }

    public function newTask()
    {
        $validatedData = request()->validate([
            'userId' => ['required', 'integer']
        ]);
        $statuses = Status::get();

        $userId = $validatedData['userId'];

        return view('admin.createTaskPage', [
            'title' => 'Создание задачи для пользователя '. User::find($userId)->name,
            'statuses' => $statuses,
            'userId' => $userId
        ]);
    }

    public function editUser($id)
    {
        $user = User::find($id);

        $username = $user->name;

        return view('admin.editUser', [
            'title' => 'Редактирование пользователя '. $username,
            'userId' => $user->id,
            'username' => $username,
            'email' => $user->email
        ]);
    }

    public function editUserStore() // userId name email old_password password password_confirmation
    {
        $userId = request()->userId;
        $user = User::find($userId);

        if (request()->name != $user->name)
        {
            $valid = request()->validate([
                'name' => 'required'
            ]);
            $user->name = $valid['name'];
        }

        if (request()->email != $user->email)
        {
            $valid = request()->validate([
                'email' => ['required', 'unique:users', 'email'],
            ]);
            $user->email = $valid['email'];
        }

        if (isset(request()->password))
        {
            $validatedData = request()->validate([
            'oldPassword' => 'current_password:web',
            'password' => ['required', Password::min(8), "confirmed"]
            ]);

            $user->password = bcrypt($validatedData['password']);
        }

        $user->save();

        return redirect()->route('admin.editUser', $userId);
    }

    public function deleteUser()
    {
        $delete = User::find(request()->userId);

        $delete->delete();

        $delete->trashed();

        return redirect()->back();
    }
}

