<?php

namespace App\Livewire\User;

use Livewire\Component;

class Userlist extends Component
{
    public string $name = 'Захар';
    public string $lastName;
    public string $fullName;
    public string $title;
    public $users = ["User 1", "User 2", "User 3"];
    public string $user;

    public function add()
    {
        $this->users[] = $this->user;
    }

    public function mount($lastName)
    {
        $this->lastName = $lastName;
        $this->fullName = $this->name . ' ' . $lastName;
    }

    public function render()
    {
        return view('livewire.user.userlist');
    }
}
