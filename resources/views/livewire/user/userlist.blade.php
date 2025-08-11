<div class="row">

    <div class="col-md-6">

        <form wire:submit="addUser">
        <div class="mb-3">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" wire:model.blur="name" wire:keydown.enter="addUser" placeholder="Имя">
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <input type="email" class="form-control @error('email') is-invalid @enderror" wire:model.blur="email" wire:keydown.enter="addUser" placeholder="Email">
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <input type="password" class="form-control @error('password') is-invalid @enderror" wire:model.blur="password" wire:keydown.enter="addUser" placeholder="Пароль">
            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="d-flex align-items-center gap-3">
            <button type="submit" class="btn btn-primary my-2">Добавить</button>
            <div class="spinner-border text-primary" role="status" wire:loading wire:target="addUser">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
        </form>
    </div>

    <div class="col-md-6">


        <ul>
            @forelse ($users as $user)
                <li wire:key="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})
                    | <a href="#" wire:click.prevent="deleteUser({{ $user->id }})" wire:confirm="Удалить?">Удалить</a>
                </li>
            @empty
                <p>Тут пусто...</p>
            @endforelse
        </ul>    
        
    </div>

</div>
