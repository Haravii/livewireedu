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

        <div class="mb-3">
            <label for="description" class="form-label">Цвет</label>
        <div class="btn-group border" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="btnColor" id="radio1" value="btn-primary" autocomplete="off" checked>
            <label class="btn btn-primary" for="radio1">&#x200b; &#x200b; &#x200b; &#x200b;</label>

            <input type="radio" class="btn-check" name="btnColor" id="radio2" value="btn-secondary" autocomplete="off">
            <label class="btn btn-secondary" for="radio2">&#x200b; &#x200b; &#x200b; &#x200b;</label>

            <input type="radio" class="btn-check" name="btnColor" id="radio3" value="btn-success" autocomplete="off">
            <label class="btn btn-success" for="radio3">&#x200b; &#x200b; &#x200b; &#x200b;</label>

            <input type="radio" class="btn-check" name="btnColor" id="radio4" value="btn-danger" autocomplete="off">
            <label class="btn btn-danger" for="radio4">&#x200b; &#x200b; &#x200b; &#x200b;</label>
            
            <input type="radio" class="btn-check" name="btnColor" id="radio5" value="btn-warning" autocomplete="off">
            <label class="btn btn-warning" for="radio5">&#x200b; &#x200b; &#x200b; &#x200b;</label>

            <input type="radio" class="btn-check" name="btnColor" id="radio6" value="btn-info" autocomplete="off">
            <label class="btn btn-info" for="radio6">&#x200b; &#x200b; &#x200b; &#x200b;</label>

            <input type="radio" class="btn-check" name="btnColor" id="radio7" value="btn-light" autocomplete="off">
            <label class="btn btn-light" for="radio7">&#x200b; &#x200b; &#x200b; &#x200b;</label>

            <input type="radio" class="btn-check" name="btnColor" id="radio8" value="btn-dark" autocomplete="off">
            <label class="btn btn-dark" for="radio8">&#x200b; &#x200b; &#x200b; &#x200b;</label>
        </div>
        </div>

            <button type="submit" class="btn btn-primary">Создать</button>
    </form>
</div>
@endsection