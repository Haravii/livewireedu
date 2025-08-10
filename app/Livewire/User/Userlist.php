<?php

namespace App\Livewire\User;

use Livewire\Component;

class Userlist extends Component
{
    public string $title;

    public string $username; 

    public array $users = [];

    public function addUser()
    {
        $this->users[] = $this->username;
        $this->reset(['username']);
    }

    public function render()
    {
        return view('livewire.user.userlist');
    }
}
