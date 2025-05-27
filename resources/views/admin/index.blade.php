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
            @foreach ($users as $user)
                <li class="list-group-item mb-2">{{ $user->name }}  || 
                  {{ $user->email }}
                    <div class="text-end">
                    <a href="{{ route('admin.usersTasks', ['userId' => $user->id]) }}" class="btn btn-primary text-end">Задачи<a>
                    <a href="" class="btn btn-primary text-end">Редактировать<a>
                    <a href="" class="btn btn-danger text-end">Удалить<a></div>
                </li>
            @endforeach
        </ul>
    </div>
  </div>
</div>
</div>

@endsection