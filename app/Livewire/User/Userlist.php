<?php

namespace App\Livewire\User;


use Livewire\Attributes\On;
use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Userlist extends Component
{

    use WithPagination;
    public function deleteUser(int $id)
    {
        User::find($id)->delete();
    }

    #[On('user-created')]
    public function updateUser($user = null)
    {
        //
    }

    

    public function render()
    {
        return view('livewire.user.userlist')-> with(['users' => User::query()->orderBy('id', 'desc')
        ->paginate(5, pageName: 'users-page')]);
    }
}
