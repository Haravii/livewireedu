<div>
    <h1>{{ $title }}</h1>

    <input type="text" placeholder="Пусто..." wire:model.live="name">
    <input type="text" placeholder="Пусто..." wire:model.live="lastName">

    <p>Name: {{$name}}</p>
    <p>Lastname: {{$lastName}}</p>
    <p>FullName: {{$fullName}}</p>

    <div class="input-group mb-3">
        <input type="text" class="form-control" wire:model="user">
        <button class="btn btn-primary" wire:click="add">Добавить</button>
    </div>

    <ul>
        @foreach($users as $user)
            <li>{{ $user }}</li>
        @endforeach  
    </ul>    
</div>
