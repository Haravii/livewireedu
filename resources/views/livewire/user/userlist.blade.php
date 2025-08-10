<div class="row">

    <div class="col-md-6">

        <form wire:submit="addUser">
        <input type="text" class="form-control" wire:model="username" wire:keydown.enter="addUser">
        <button type="submit" class="btn btn-primary my-2">Добавить</button>
        </form>
    </div>

    <div class="col-md-6">
        <ul>
            @forelse ($users as $user)
                <li>{{ $user }}</li>
            @empty
                <p>Тут пусто...</p>
            @endforelse
        </ul>    
        
    </div>

</div>
