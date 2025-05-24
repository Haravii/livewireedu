@extends('layouts.main')

@section('title', $title ?? 'test title')

@section('content')

    <form method="POST" action="{{ route('authUser') }}">
        @csrf
    <div class="mb-3">
        <label for="InputEmail" class="form-label">Email</label>
        <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" name="email" required>
    </div>
    <div class="mb-3">
        <label for="InputPassword" class="form-label">Пароль</label>
        <input type="password" class="form-control" id="InputPassword" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection