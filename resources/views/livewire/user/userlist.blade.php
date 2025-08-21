<div class="col-md-12">
    
    <ul id="users-list">
        @forelse ($users as $user)
            <li wire:key="{{ $user->id }}">
            {{ $user->name }} 
            ({{ $user->email }}) 
            | {{ $user->country->name }}
                | <a href="#" wire:click.prevent="deleteUser({{ $user->id }})" wire:confirm="Удалить?">Удалить</a>
            @if ($user->avatar)
                <img src="{{ asset("uploads/{$user->avatar}") }}" height="30px">
            @endif
            </li>
        @empty
            <p>Тут пусто...</p>
        @endforelse
    </ul>    

    {{ $users->links(data: ['scrollTo' => '#users-list']) }}
        
</div>
