@extends('layouts.main')

@section('title', $title ?? 'test title')

@section('content')
<div>
    <h2 class="mb-3">{{ $title ?? 'test title' }}</h2>
    <form method="post" action="{{ route('createNewTask') }}">
        @csrf
        <input type="hidden" name="userId" value="{{ auth()->user()->id }}">
        <div class="mb-3">
            <label for="title" class="form-label">Название задачи</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Опиание задачи(не обязательно)</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Статус задачи</label>
            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                <input type="radio" class="btn-check" name="statusId" id="btnradio1" autocomplete="off" value="1" checked>
                <label class="btn btn-outline-primary" for="btnradio1">1</label>

                <input type="radio" class="btn-check" name="statusId" id="btnradio2" value="2" autocomplete="off">
                <label class="btn btn-outline-primary" for="btnradio2">2</label>
                {{--  --}}
            </div>
        </div>
            <button type="submit" class="btn btn-primary">Создать</button>
    </form>
</div>
@endsection