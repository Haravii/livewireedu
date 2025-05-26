@extends('layouts.main')

@section('title', $title ?? 'test title')

@section('content')
<div>
    <h2 class="mb-3">{{ $title ?? 'test title' }}</h2>
    <form method="post" action="{{ route('admin.createNewStatus') }}">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Название статуса</label>
            <input type="text" class="form-control" id="title" name="name">
        </div>
        </div>
            <button type="submit" class="btn btn-primary">Создать</button>
    </form>
</div>
@endsection