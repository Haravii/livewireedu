<?php

namespace App\Livewire\User;

use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Models\User;

class Userlist extends Component
{
    #[Validate('required')]
    #[Validate('min:2', as: 'ЖОПА')]
    #[Validate('max:30')]
        public string $name;

    #[Validate('required|email|max:30')]
        public string $email;

    #[Validate('required|min:6')]
        public string $password;

    
    // protected function rules(): array
    // {
    //     return [
    //         'name' => 'required|min:2|max:30', 
    //         'email' => 'required|email|max:30',
    //         'password' => 'required|min:6'
    //     ];
    // }

    protected function messages()
    {
        return [
            'name.required' => 'ИМЕЧКО ТА ОБЯЗАТЕЛЬНО'
        ];
    }

    public function addUser()
    {
        $validated = $this->validate();

        User::create($validated);
        $this->reset();
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
