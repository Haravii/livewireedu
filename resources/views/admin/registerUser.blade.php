@extends('layouts.main')

@section('title', $title ?? 'test title')

@section('content')
<div>
    <h2 class="mb-3">{{ $title ?? 'test title' }}</h2>
    <form method="post" action="{{ route('admin.registerUser') }}">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Имя пользователя</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Пароль</label>
            <input type="password" class="form-control" id="password" aria-describedby="passwordHelp" name="password">
        <div id="passwordHelp" class="form-text">Минимум 8 символов.</div>
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Подтверждение пароля</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="Check" name="isAdmin" value="1">
            <label class="form-check-label" for="Check">Может просматривать задачи других пользователей</label>
        </div>
            <button type="submit" class="btn btn-primary">Создать</button>
    </form>
</div>
@endsection