<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\User;

class Userlist extends Component
{

    public string $name; 
    public string $email;
    public string $password;


    public function addUser()
    {
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
        ]);
        $this->reset(['name', 'email', 'password']);
    }

    public function deleteUser(int $id)
    {
        User::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.user.userlist')-> with(['users' => User::all()]);
    }
}
