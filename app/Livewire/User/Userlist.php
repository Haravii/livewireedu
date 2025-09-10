<?php

namespace App\Livewire\User;


use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class Userlist extends Component
{

    use WithPagination;

    #[Url]
    public int $limit = 10;

    public array $limitList = [10, 25, 50, 100];

    #[Url]
    public string $search = '';

    public string $orderByField = 'users.id';
    public string $orderByDirection = 'desc';

    public array $orderByFieldList = [
        'users.id' => 'ID',
        'users.name' => 'Имя',
        'users.email' => 'Email',
        'countries.name' => 'Страна',
        'cities.name' => 'Город',
        'streets.name' => 'Улица'
    ];

    public function changeOrder($field)
    {
        if($this->orderByField == $field)
        {
            $this->orderByDirection = $this->orderByDirection == 'asc' ? 'desc' : 'asc';
            return;
        }

        $this->orderByField = $this->orderByFieldList[$field] ? $field : 'users.id';
        $this->orderByDirection = 'asc';
    }

     public function mount()
    {
        if (!in_array($this->limit, $this->limitList)) {
            $this->redirectRoute('home');
        }
    }

    public function changeLimit()
    {
        $this->limit = in_array($this->limit, $this->limitList) ? $this->limit : $this->limitList[0];
        $this->resetPage();
    }

    public function updating($property, $value)
    {
        if ($property == 'search')
        {
            $this->resetPage();
        }
    }
    
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
        $users = User::query()
        ->select('users.id', 'users.name', 'users.email', 'countries.name as country_name',
         'cities.name as city_name', 'streets.name as street_name')
        ->join('countries', 'users.country_id', '=', 'countries.id')
        ->leftJoin('cities', 'users.city_id', '=', 'cities.id')
        ->leftJoin('streets', 'users.street_id', '=', 'streets.id')
        ->when($this->search, function ($query)
            {
                $query->whereAny([
                    'users.name', 'users.email', 'countries.name', 'cities.name', 'streets.name'
                ], 'like', '%'.$this->search.'%');
            })
            ->orderBy($this->orderByField, $this->orderByDirection)
            ->paginate($this->limit);
        return view('livewire.user.userlist')-> with([
            'users' => $users,
        ]);
    }
}
