<div class="col-md-8">
    
    <ul id="users-list">
        @forelse ($users as $user)
            <li wire:key="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})
                | <a href="#" wire:click.prevent="deleteUser({{ $user->id }})" wire:confirm="Удалить?">Удалить</a>
            </li>
        @empty
            <p>Тут пусто...</p>
        @endforelse
    </ul>    

    {{ $users->links(data: ['scrollTo' => '#users-list']) }}
        
</div>
