@extends('layouts.main')

@section('title', $title ?? 'test title')

@section('content')
<div>
    <h2 class="mb-3">{{ $title ?? 'test title' }}</h2>
    <form method="post" action="{{ route('createNewTask') }}">
        @csrf
        <input type="hidden" name="userId" value="{{ $userId }}">
        <input type="hidden" name="admin" value="true">
        <div class="mb-3">
            <label for="title" class="form-label">Название задачи</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
        </div>
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="mb-3">
            <label for="description" class="form-label">Опиание задачи(не обязательно)</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Статус задачи</label>
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                @foreach ($statuses as $status)
                    <input type="radio" class="btn-check" name="statusId" id="btnradio{{ $status->id }}" autocomplete="off" value="{{ $status->id }}" checked>
                    <label class="btn {{ $status->btn_color }}" for="btnradio{{ $status->id }}">{{ $status->status_name }}</label>
                @endforeach
            </div>
        </div>

            <button type="submit" class="btn btn-primary">Создать</button>
    </form>
</div>
@endsection