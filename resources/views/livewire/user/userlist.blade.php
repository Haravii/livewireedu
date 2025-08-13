<div class="row">

    <div class="col-md-6">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form wire:submit="addUser">
        <div class="mb-3">
            <input type="text" name="name" class="form-control @error('form.name') is-invalid @enderror" wire:model.blur="form.name" wire:keydown.enter="addUser" placeholder="Имя">
            @error('form.name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <input type="email" class="form-control @error('form.email') is-invalid @enderror" wire:model.blur="form.email" wire:keydown.enter="addUser" placeholder="Email">
            @error('form.email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <input type="password" class="form-control @error('form.password') is-invalid @enderror" wire:model.blur="form.password" wire:keydown.enter="addUser" placeholder="Пароль">
            @error('form.password') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
