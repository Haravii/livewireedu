@extends('layouts.main')

@section('title', $title ?? 'test title')

@section('content')

<div class="w-75 mx-auto justify-content-md-end">
    <div class="text-end"><a href="{{ route('admin.register') }}" class="btn btn-primary text-end mb-3">Создать<a></div>
<div class="card">
  <div class="card-header">
    Пользователи 
  </div>
  <div class="card-body">
    <div class="card-text">
        <ul class="list-group">
            @for ($i = 1; $i < 10; $i++)
                <li class="list-group-item mb-2">Пользователь {{ $i }}
                    <div class="text-end">
                    <a href="" class="btn btn-primary text-end">Задачи<a>
                    <a href="" class="btn btn-primary text-end">Редактировать<a>
                    <a href="" class="btn btn-danger text-end">Удалить<a></div>
                </li>
            @endfor
        </ul>
    </div>
  </div>
</div>
</div>

@endsection