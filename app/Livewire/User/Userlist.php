<?php

namespace App\Livewire\User;

use App\Livewire\Forms\UserForm;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\User;

class Userlist extends Component
{
    public UserForm $form;   

    public function addUser()
    {
        $this->form->saveUser();
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
