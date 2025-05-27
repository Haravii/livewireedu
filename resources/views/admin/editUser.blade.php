@extends('layouts.main')

@section('title', $title ?? 'test title')

@section('content')
<div>
    <h2 class="mb-3">{{ $title ?? 'test title' }}</h2>
    <form method="post" action="{{ route('admin.editUserPOST') }}">
        @csrf
        <input type="hidden" name="userId" value="{{ $user->id }}">
        <div class="mb-3">
            <label for="title" class="form-label">Имя пользователя</label>
            <input type="text" class="form-control" id="title" name="name" value="{{ $user->name }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
        </div>
        <br class="mb-3">
        <div class="mb-3">
            <label for="oldPassword" class="form-label">Cтарый пароль</label>
            <input type="password" class="form-control @error('oldPassword') is-invalid @enderror" id="oldPassword" aria-describedby="oldPasswordHelp" name="oldPassword">
        </div>
        @error('oldPassword')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="password" class="form-label">Новый пароль</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" aria-describedby="passwordHelp" name="password">
        <div id="passwordHelp" class="form-text">Минимум 8 символов.</div>
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Подтверждение пароля</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="Check" name="isAdmin" value="1" @if ($user->is_admin) checked="checked" @endif>
            <label class="form-check-label" for="Check">Может просматривать задачи других пользователей</label>
        </div>
            <button type="submit" class="btn btn-primary">Создать</button>
    </form>
</div>
@endsection