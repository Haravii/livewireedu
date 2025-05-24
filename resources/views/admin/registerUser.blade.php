@extends('layouts.main')

@section('title', $title ?? 'test title')

@section('content')
<div>
    <h2 class="mb-3">Регистрация</h2>
    <form method="post" action="{{ route('client.registerClient') }}">
        @csrf

        <div class="mb-3">
            <label for="surname" class="form-label">Фамилия</label>
            <input type="text" class="form-control" id="surname" name="surname">
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Имя</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="patronymic" class="form-label">Отчество</label>
            <input type="text" class="form-control" id="patronymic" name="patronymic" aria-describedby="patronymicHelp">
            <div id="patronymicHelp" class="form-text">Минимум 8 символов.</div>
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
            <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
    </form>
</div>
@endsection